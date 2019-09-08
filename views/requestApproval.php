<div class="row">
	<div class="col-10">
		
		<div class="form-group row mb-1">
			<label for="referenceNumber" class="col-2 col-form-label col-form-label-sm">Reference Number</label>
		    <div class="col-3">
		      <input type="text" class="form-control form-control-sm" id="referenceNumber">
		    </div>
		</div>
		<div class="form-group row mb-1">
			<label for="requestorName" class="col-2 col-form-label col-form-label-sm">Requestor Name</label>
		    <div class="col-3">
		      <input type="text" class="form-control form-control-sm" id="requestorName">
		    </div>
		</div>
		<div class="form-group row mb-1">
			<label for="requestedPatient" class="col-2 col-form-label col-form-label-sm">Requested Patient</label>
		    <div class="col-3">
		      <input type="text" class="form-control form-control-sm" id="requestedPatient">
		    </div>
		</div>
		<div class="form-group row mb-1">
			<label for="dateRequested" class="col-2 col-form-label col-form-label-sm">Date Requested</label>
		    <div class="col-3">
		      <input type="date" class="form-control form-control-sm" id="dateRequested">
		    </div>
		</div>
		<div class="form-group row mb-1">
			<label for="requestStatus" class="col-2 col-form-label col-form-label-sm">Request Status</label>
		    <div class="col-3">
		      <select class="form-control form-control-sm" id="requestStatus">
		      	<option value=""></option>
		      	<option value="0">Pending</option>
		      	<option value="1">Approved</option>
		      	<option value="2">Rejected</option>
		      </select>
		    </div>
		</div>
		<div class="form-group row">
		    <div class="col-5">
		    	<div class="pull-right">
			      <button id="btnClear" class="btn btn-primary btn-sm">Clear</button>
			      <button id="btnSearch" class="btn btn-primary btn-sm">Search</button>
			 	</div>
		    </div>
		</div>
	</div>
</div>
<table id="tblRequest" class="table table-sm table-hover table-bordered table-striped table-primary table-responsive mb-2">
	<thead>
		<tr>
			<th>Reference Number</th>
			<th>Requestor Name</th>
			<th>Requested Patient</th>
			<th>Request Status</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<div id="divTotalCount">
	<div class="pull-right pr-2">
		<h6>Total Count: <span id="totalCount"></span></h6>
	</div>
</div>
