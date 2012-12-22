<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 *
 */
class TemplateHelper
{
	/**
	 * Paginates a BaseCriteria instance.
	 */
	public static function paginateCriteria(BaseCriteria $criteria)
	{
		$currentPage = blx()->request->getPageNum();
		$limit = $criteria->limit;
		$total = $criteria->total();
		$totalPages = ceil($total / $limit);

		if ($currentPage > $totalPages)
		{
			$currentPage = $totalPages;
		}

		$offset = $limit * ($currentPage - 1);

		$path = blx()->request->getPath();
		$pageUrlPrefix = ($path ? $path.'/' : '').blx()->config->get('pageTrigger');

		$info = array(
			'first'       => $offset + 1,
			'last'        => $offset + $limit,
			'total'       => $total,
			'currentPage' => $currentPage,
			'totalPages'  => $totalPages,
			'prevUrl'     => ($currentPage > 1           ? UrlHelper::getUrl($pageUrlPrefix.($currentPage-1)) : null),
			'nextUrl'     => ($currentPage < $totalPages ? UrlHelper::getUrl($pageUrlPrefix.($currentPage+1)) : null),
		);

		// Get the entities
		$criteria->offset = $offset;
		$entities = $criteria->find();

		return array($info, $entities);
	}
}
