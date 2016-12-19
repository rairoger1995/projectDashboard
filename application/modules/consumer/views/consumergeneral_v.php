<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- content -->
<script>
    $(function(){
        $.jGrid.newGrid({
            target: '#target-div-list',
            searchData : '#form_action',
            url : '<?= site_url('consumer/consumerGeneral_c/jgrid_ajax') ?>',
            columns : {
                email : {
                    name: 'Email',
                    sortable: true,
                },
                first_name : {
                    name: 'First name',
                    sortable: true,
                },
                last_name : {
                    name: 'Last name',
                    sortable: true,
                },
                uniqueid : {
                    name: 'Unique ID',
                    sortable: true,
                },
                phone : {
                    name: 'Phone',
                    sortable: true,
                },
                role : {
                    name: 'Role',
                    sortable: true,
                },
                company_name : {
                    name: 'Company Name',
                    sortable: true,
                },
                office_location : {
                    name: 'Office Location',
                    sortable: true,
                },
                suburb : {
                    name: 'Suburb',
                    sortable: true,
                },
                state : {
                    name: 'State',
                    sortable: true,
                },
                postcode : {
                    name: 'Postcode',
                    sortable: true,
                },
                age : {
                    name: 'Age',
                    sortable: true,
                },
                gender : {
                    name: 'Gender',
                    sortable: true,
                },
                yearsadviser : {
                    name: 'Years as adviser/FP',
                    sortable: true,
                },
                source : {
                    name: 'Source',
                    sortable: true,
                },
                softbounce : {
                    name: 'Softbounce',
                    sortable: true,
                },
                reason : {
                    name: 'Reason for Bounce',
                    sortable: true,
                },
                status : {
                    name: 'Status',
                    sortable: true,
                },
                action : {
                    name: 'Action',
                },
            },
            sort: 'first_name',
            order: 'asc',
            limit: 10,
            topBar: false,
        });
    });
</script>

<div class="row">
    <a href="<?= site_url('add-entry') ?>" class="btn btn-info add-entry">Add Entry</a>
    
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?= $title ?></h3>
		</div>
		<fieldset class="search-controls search-controls-two-column filter">
            <form class="form-inline" id="form_action" method="post">
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" placeholder="Last name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="age" placeholder="Age" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="postcode" placeholder="Postcode" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="suburb" placeholder="Suburb" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="state" placeholder="State" class="form-control">
                </div>
                <div class="form-group">
                    <select class="form-control" id="status" name="status">
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group btn-control">
                    <button type="submit" data-jGridTarget="#target-div-list" class="btn">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </form>
        </fieldset>
        <br>
        <div id="target-div-list"></div>
	</div>
</div>
