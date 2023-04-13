<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Offer_slider_model extends CI_Model
{
    function add_offer_slider($data)
    {
        $data = escape_array($data);
        $offer_data = [
            'offer_ids' => (isset($data['offer_ids']) && !empty($data['offer_ids'])) ? implode(',', $data['offer_ids']) : '',
            'style' => $data['style'],
        ];

        if (isset($data['edit_offer_slider'])) {
            $this->db->set($offer_data)->where('id', $data['edit_offer_slider'])->update('offer_sliders');
        } else {
            $this->db->insert('offer_sliders', $offer_data);
        }
    }
    public function get_offer_slider_list()
    {
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'desc';
        $multipleWhere = '';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            if ($_GET['sort'] == 'id') {
                $sort = "id";
            } else {
                $sort = $_GET['sort'];
            }
        if (isset($_GET['order']))
            $order = $_GET['order'];

        if (isset($_GET['search']) and $_GET['search'] != '') {
            $search = $_GET['search'];
            $multipleWhere = ['id' => $search, 'style' => $search, 'offer_ids' => $search];
        }

        $count_res = $this->db->select(' COUNT(id) as `total` ');

        if (isset($multipleWhere) && !empty($multipleWhere)) {
            $count_res->or_like($multipleWhere);
        }
        if (isset($where) && !empty($where)) {
            $count_res->where($where);
        }

        $city_count = $count_res->get('offer_sliders')->result_array();

        foreach ($city_count as $row) {
            $total = $row['total'];
        }



        $search_res = $this->db->select(' * ');
        if (isset($multipleWhere) && !empty($multipleWhere)) {
            $search_res->or_like($multipleWhere);
        }
        if (isset($where) && !empty($where)) {
            $search_res->where($where);
        }

        $city_search_res = $search_res->order_by($sort, "asc")->limit($limit, $offset)->get('offer_sliders')->result_array();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        foreach ($city_search_res as $row) {
            $row = output_escaping($row);

            $operate = ' <a href="javascript:void(0)" class="edit_btn btn btn-primary btn-xs mr-1 mb-1" title="Edit" data-id="' . $row['id'] . '" data-url="admin/offer_slider/"><i class="fa fa-pen"></i></a>';
            $operate .= ' <a  href="javascript:void(0)" class="btn btn-danger btn-xs mr-1 mb-1" title="Delete" data-id="' . $row['id'] . '" id="delete-offer-slider" ><i class="fa fa-trash"></i></a>';
            $tempRow['id'] = $row['id'];
            $tempRow['style'] = ucfirst(str_replace('_', ' ', $row['style']));
            $tempRow['offer_ids'] = $row['offer_ids'];
            $tempRow['date'] = $row['date_added'];
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        print_r(json_encode($bulkData));
    }
    function get_offer_data($search_term = "")
    {
        // Fetch offer
        $this->db->select('*');
        $this->db->where("id like '%" . $search_term . "%'");
        $fetched_records = $this->db->get('offers');
        $offers = $fetched_records->result_array();


        // Initialize Array with fetched data
        $data = array();
        foreach ($offers as $offer) {
            $data[] = array("id" => $offer['id'], "text" => $offer['id']);
        }
        return $data;
    }
}
