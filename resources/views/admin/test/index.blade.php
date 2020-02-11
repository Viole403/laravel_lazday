@extends('template.app')

@section('pagetitle','Transaction')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open
    Modal</button>
<form method="post" action="{{url('chempionleague')}}" id="form">
    @csrf
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Uefa Champion League</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Club">Club:</label>
                            <input type="text" class="form-control" name="club" id="club">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Country">Country:</label>
                            <input type="text" class="form-control" name="country" id="country">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Goal Score">Goal Score:</label>
                            <input type="text" class="form-control" name="score" id="score">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" id="ajaxSubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
