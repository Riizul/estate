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
          <h1>Type</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/content">Property</a></li>
            <li class="breadcrumb-item active">Type</li>
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
                <button id="btn-gallery-content" 
                    type="button" 
                    class="btn btn-primary btn-sm float-right" 
                    data-toggle="modal" 
                    data-target="#Modal" add>
                    <i class="fa fa-plus m-r-5"></i>
                    Add
                </button>
                <table id="grid" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Type</th>
                            <th scope="col" width="80">Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $item)
                            <tr>
                                <td>{{ $item->categoryName }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="#" 
                                        class="btn btn-info btn-sm btn-icon" 
                                        data-id="{{ $item->id }}" 
                                        data-category="{{ $item->categoryId }}"
                                        data-name="{{ $item->name }}" edit>
                                        <i class="fa fa-pen"></i> 
                                    </a>
                                    <a href="{{ route('type.destroy', $item->id) }}" 
                                        class="btn btn-danger btn-sm btn-icon">
                                        <i class="fa fa-trash"></i> 
                                    </a>
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

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm" 
                method="POST" 
                action="{{ route('type.store') }}">
                @csrf
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="category" class="form-control" >
                            @foreach($propertyCategories as $category)
                            <option value="{{ $category->id }}">
                            {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" 
                            class="form-control" 
                            id="name"
                            name="name" 
                            required
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
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
    $(document).ready(function () {
        $('#grid').dataTable({
            "bLengthChange": false,
            language: {search: "", searchPlaceholder: "Search..." },
        });

        $('#grid_filter')
            .parent()
            .removeClass('col-sm-12')
            .addClass('col-md-12 m-0 p-0');

        $(".modal .close").click(function () {
            $("#Modal").modal("hide");
        })

        $("[add]").click(function() {
            $("#action").val("add");
            $('#modalForm').trigger("reset");
            $('.modal-title').text("Add type");
        })

        $("[edit]").click(function() {
            let id = $(this).data("id"),
                category = $(this).data("category"),
                name = $(this).data("name");

            $("#action").val("edit");
            $("#id").val(id);
            $("#name").val(name);
            $('.modal-title').text("Edit type");
            $("#Modal").modal("show");
            $("#category").val(category).change();
        })

    });
</script>
@endsection