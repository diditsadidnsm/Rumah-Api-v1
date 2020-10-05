<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function index($page = null)
	{
		$data['title']	= 'Distributor Alat Pemadam Kebakaran dan Jual APAR Murah';
		$data['site_desc']	= 'PT. Tigris Berkat Sejati menyediakan layanan perencanaan sistem kebakaran, pelaksanaan instalasi sistem kebakaran dan perawatan sistem kebakaran Anda. Perencanaan yang tepat menghasilkan sistem kebakaran menjadi lebih akurat.';
		$data['site_key']	= 'jual apar murah, alat pemadam kebakaran, alat pemadam murah terdekat, jual alat pemadam murah, kebakaran, kerusakan, pemadaman';
		$data['hydrant']	= $this->home->select(
			[
				'product.id', 'product.slug AS product_slug', 'product.title AS product_title', 'id_category',
				'product.description', 'product.image',
				'product.price', 'product.is_available',
				'category.title AS category_title', 'category.slug AS category_slug'
			]
		)
			->join('category')
			->where('id_category', 1)
			->paginate($page)
			->get();
		$data['alarm']	= $this->home->select(
			[
				'product.id', 'product.slug AS product_slug', 'product.title AS product_title', 'id_category',
				'product.description', 'product.image',
				'product.price', 'product.is_available',
				'category.title AS category_title', 'category.slug AS category_slug'
			]
		)
			->join('category')
			->where('id_category', 2)
			->paginate($page)
			->get();
		$data['extinguisher']	= $this->home->select(
			[
				'product.id', 'product.slug AS product_slug', 'product.title AS product_title', 'id_category',
				'product.description', 'product.image',
				'product.price', 'product.is_available',
				'category.title AS category_title', 'category.slug AS category_slug'
			]
		)
			->join('category')
			->where('id_category', 3)
			->paginate($page)
			->get();
		$data['content']	= $this->home->select(
			[
				'product.id', 'product.slug AS product_slug', 'product.title AS product_title',
				'product.description', 'product.image',
				'product.price', 'product.is_available',
				'category.title AS category_title', 'category.slug AS category_slug'
			]
		)
			->join('category')
			->where('product.is_available', 1)
			->paginate($page)
			->get();
		$data['total_rows']	= $this->home->where('product.is_available', 1)->count();
		$data['pagination']	= $this->home->makePagination(
			base_url('home'),
			2,
			$data['total_rows']
		);
		$data['page']	= 'pages/home/index';

		$this->view($data);
	}
}

/* End of file Home.php */