/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

(function($) {

    var $modalContainerDiv = null;

    var OperationManager = Blocks.Base.extend({

        $startOperationsButton: null,
        $sourceMasterCheckbox: null,
        $sourceCheckboxes: null,
        $indexCheckbox: null,
        $sizesCheckbox: null,
        $sizeMasterCheckbox: null,
        $sizeCheckboxes: null,
        $progressBarContainer: null,


        sessionId: null,
        queue: null,

        modal: null,

        missingFolders: [],

        init: function()
        {
            this.$startOperationsButton = $('#start-operations');

            this.$sourceMasterCheckbox = $('.assets-sources input[type=checkbox].all');
            this.$sourceCheckboxes = $('.assets-sources input[type=checkbox]').not('.all');

            this.$indexCheckbox = $('#do-index');
            this.$sizesCheckbox = $('#do-sizes');

            this.$sizeMasterCheckbox = $('#sizes input[type=checkbox].all');
            this.$sizeCheckboxes = $('#sizes input[type=checkbox]').not('.all');

            this.$progressBarContainer = $('.operation-progress');


            this.addListener(this.$startOperationsButton, 'click', 'startOperations');
        },

        startOperations: function ()
        {
            if (this.$startOperationsButton.hasClass('disabled'))
            {
                return;
            }

            var checkedSizes = [];

            if (this.$sizesCheckbox.prop('checked'))
            {
                this.$sizeCheckboxes.filter(':checked').each(function () {
                    checkedSizes.push($(this).val());
                });
            }

            var doIndex = this.$indexCheckbox.prop('checked');

            var checkedSources = this.$sourceCheckboxes.filter(':checked');


            if (checkedSources.length == 0 || !(doIndex || checkedSizes.length))
            {
                this.$startOperationsButton.removeClass('disabled');
                return;
            }

            var checkedOperations = {doIndexes: Number(doIndex), sizes: checkedSizes};

            this.$startOperationsButton.addClass('disabled');

            this.$sourceMasterCheckbox.prop('disabled', true);
            this.$sourceCheckboxes.prop('disabled', true);
            this.$sizeMasterCheckbox.prop('disabled', true);
            this.$sizeCheckboxes.prop('disabled', true);
            this.$indexCheckbox.prop('disabled',  true);

            Blocks.postActionRequest('assetOperations/getSessionId', $.proxy(function(data){
                this.sessionId = data.sessionId;
                this.missingFolders = [];
                this.queue = new AjaxQueueManager(10, this.displayIndexingReport, this);

                this.$progressBarContainer.empty();
                var _t = this;

                checkedSources.each(function () {
                    var progress_bar = $('<div class="progress-bar"><label>' + $(this).parent().text() + '</label><span></span></div>').appendTo(_t.$progressBarContainer);
                    var params = {
                        sourceId: $(this).val(),
                        session: _t.sessionId,
                        doIndexes: checkedOperations.doIndexes,
                        doSizes: checkedOperations.sizes
                    };

                    _t.queue.addItem(Blocks.getActionUrl('assetOperations/startIndex'), params, $.proxy(function (data) {

                        progress_bar.attr('total', data.total).attr('current', 0);
                        for (var i = 0; i < data.total; i++) {
                            params = {
                                session: this.sessionId,
                                sourceId: data.sourceId,
                                offset: i,
                                doIndexes: checkedOperations.doIndexes,
                                doSizes: checkedOperations.sizes
                            };

                            this.queue.addItem(Blocks.getActionUrl('assetOperations/performIndex'), params, function () {
                                progress_bar.attr('current', parseInt(progress_bar.attr('current'), 10) + 1);
                                progress_bar.find('>span').html(progress_bar.attr('current') + ' / ' + progress_bar.attr('total'));
                            });
                        }

                        if (typeof data.missingFolders != "undefined") {
                            for (var folder_id in data.missingFolders) {
                                this.missingFolders.push({folder_id: folder_id, folder_name: data.missingFolders[folder_id]});
                            }
                        }
                    }, _t));
                });
                this.queue.startQueue();
            }, this));
        },

        /**
         * Display Indexing report after all is done
         */
        displayIndexingReport: function () {

            this.$startOperationsButton.removeClass('disabled');
            this.$progressBarContainer.html('');

            if ( ! this.$indexCheckbox.prop('checked')) {
                this.releaseLock();
                return;
            }
            var checkedSources = [];

            this.$sourceCheckboxes.filter(':checked').each(function () {
                checkedSources.push($(this).val());
            });

            if ($modalContainerDiv == null) {
                $modalContainerDiv = $('<div class="modal index-report"></div>').addClass().appendTo(Blocks.$body);
            }

            if (this.modal == null) {
                this.modal = new Blocks.ui.Modal();
                this.modal.sessionId = this.sessionId;
                this.modal.OperationManager = this;
            }

            var params = {
                sessionId: this.sessionId,
                command: JSON.stringify({command: 'statistics'}),
                sources: checkedSources.join(",")
            };

            $.post(Blocks.getActionUrl('assetOperations/finishIndex'), params, $.proxy(function (data) {
                var html = '';

                if (typeof data.files != "undefined" || this.missingFolders.length > 0) {
                    html += '<p>' + Blocks.t('The following items were found in the database that do not have a physical match.') +  '</p>';

                    if (this.missingFolders.length > 0) {
                        html += '<div class="report-part"><strong>' + Blocks.t('Folders') + '</strong>';
                        for (var i = 0; i < this.missingFolders.length; i++) {
                            html += '<div><label><input type="checkbox" checked="checked" class="delete_folder" value="' + this.missingFolders[i].folder_id + '" /> ' + this.missingFolders[i].folder_name + '</label></div>';
                        }
                        html += '</div>'
                    }

                    if (typeof data.files != "undefined") {
                        html += '<div class="report-part"><strong>' + Blocks.t('Files') + '</strong>';
                        for (var file_id in data.files) {
                            html += '<div><label><input type="checkbox" checked="checked" class="delete_file" value="' + file_id + '" /> ' + data.files[file_id] + '</label></div>';
                        }
                        html += '</div>'
                    }

                    html += '<footer class="footer"><ul class="right">';
                    html += '<li><input type="button" class="btn cancel" value="' + Blocks.t('Cancel') + '"></li>';
                    html += '<li><input type="button" class="btn submit delete" value="' + Blocks.t('Delete') + '"></li>';
                    html += '</ul></footer>';

                    $modalContainerDiv.empty().append(html);
                    this.modal.setContainer($modalContainerDiv);

                    this.modal.show();
                    this.modal.removeListener(Blocks.ui.Modal.$shade, 'click');

                    this.modal.addListener(this.modal.$container.find('.btn.cancel'), 'click', function () {
                        this.OperationManager.releaseLock();
                        this.hide();
                    });

                    this.modal.addListener(this.modal.$container.find('.btn.delete'), 'click', function () {

                        var command = {};
                        command.command = 'delete';
                        command.folderIds = [];
                        command.fileIds = [];

                        this.$container.find('input.delete_folder:checked').each(function (){
                            command.folderIds.push($(this).val());
                        });

                        this.$container.find('input.delete_file:checked').each(function (){
                            command.fileIds.push($(this).val());
                        });

                        var sources = [];
                        this.OperationManager.$sourceCheckboxes.filter(':checked').each(function () {
                            sources.push($(this).val());
                        });

                        var params = {
                            sessionId: this.sessionId,
                            command: JSON.stringify(command),
                            sources: sources.join(",")
                        };

                        $.post(Blocks.getActionUrl('assetOperations/finishIndex'), params, $.proxy(function(data) {
                            this.hide();

                            this.OperationManager.releaseLock();

                        }, this));
                    });
                } else {
                    this.releaseLock();
                }


            }, this));

        },

        releaseLock: function () {
            this.$sourceMasterCheckbox.prop('disabled', false);
            if (this.$sourceMasterCheckbox.prop('checked')) {
                this.$sourceMasterCheckbox.prop('disabled', false);
            } else {
                this.$sourceCheckboxes.prop('disabled', false);
            }
            this.$sizeMasterCheckbox.prop('disabled', false);
            if (this.$sizeMasterCheckbox.prop('checked')) {
                this.$sizeMasterCheckbox.prop('disabled', false);
            } else {
                this.$sizeCheckboxes.prop('disabled', false);
            }

            this.$indexCheckbox.prop('disabled', false);
        }


    });

    var operationManager = new OperationManager();

})(jQuery);
