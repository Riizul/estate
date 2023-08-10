@extends('layouts.app-master')

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{!! url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
<link rel="stylesheet" href="{!! url('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
<link rel="stylesheet" href="{!! url('assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Property</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/content">Dashboard</a></li>
            <li class="breadcrumb-item active">Property</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                @include('layouts.partials.messages')
                <table id="propertyGrid" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->categoryName }}</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    <button 
                                        class="badge {{ $item->status == 'published' ? 'bg-success' : 'bg-secondary' }} border-0 text-white" 
                                        data-id="{{ $item->id }}" 
                                        data-trigger = "{{ $item->status == 'published' ? 'publish' : 'draft' }}"
                                        publish>
                                        {{ $item->status == 'published' ? 'published' : 'drafted' }}
                                    </button>
                                </td>
                                <td width="80px">
                                    <a href="{{ route('content.edit', $item->id) }}" class="btn btn-info btn-sm btn-icon">
                                        <i class="fa fa-pen"></i> 
                                    </a>
                                    <button 
                                        class="btn btn-danger btn-sm btn-icon" 
                                        data-id="{{ $item->id }}"
                                        data-toggle="modal" 
                                        data-target="#DeleteConfirmationModal" delete>
                                        <i class="fa fa-trash"></i> 
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
 
<div class="modal fade" id="DeleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="DeleteConfirmationModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button id="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Continue delete property?</p>
                <a href="#" id="delete-btn" class="btn btn-danger btn-sm">OK</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{!! url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
<script src="{!! url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>

<script>
    $(function () {

        $('#propertyGrid').DataTable({
            language: {search: "", searchPlaceholder: "Search..." },
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('#propertyGrid_filter')
            .parent()
            .removeClass('col-sm-12')
            .addClass('col-md-12')
            .append(`<a href="{{ route('content.create') }}" class="btn btn-primary btn-sm float-right">
                    <i class="fa fa-plus m-r-5"></i> Create
                    </a>`)

        $("#propertyGrid").on("click", "[publish]", function(){
            if($(this).data('trigger') == 'draft')
                publish($(this), $(this).data('id'))
            else
                draft($(this), $(this).data('id'))
        });

        $("#propertyGrid").on("click", "[delete]", function(){
            $("#delete-btn")
                .data("id", $(this).data('id'))

            $("#delete-btn")
                .data("target",$(this).parent().parent())
        });

        $('#delete-btn').click(function () {
            $.ajax({
                type:'GET',
                url:'{{ env('APP_URL') }}/api/deleteProperty/' + $(this).data('id'),
                success:function(response) {
                    $("#delete-btn").data("target").hide()
                    $('#closeModal').click();
                }
            });
        })

        function publish(button, id) {
            $.ajax({
                type:'GET',
                url:'{{ env('APP_URL') }}/api/publishPropety/' + id,
                success:function(data) {
                    button
                        .data('trigger', 'publish')
                        .text('published')
                        .attr('class','')
                        .addClass('badge bg-success border-0 text-white')
                }
            });
        }

        function draft(button, id) {
            $.ajax({
                type:'GET',
                url:'{{ env('APP_URL') }}/api/draftPropety/' + id,
                success:function(data) {
                    button
                        .data('trigger', 'draft')
                        .text('drafted')
                        .attr('class','')
                        .addClass('badge bg-secondary border-0 text-white')
                }
            });
        }
    });
</script>
@endsection