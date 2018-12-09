@extends(config('dotenveditor.template', 'dotenv-editor::master'))

@section('content')
<div class="box box-success box-solid">
  <div class="box-header">
    <h3 class="box-title">{{ __('dotenv-editor::views.title') }}</h3>
    <div class="box-tools"> </div>
  </div>
  <div class="box-body" id="app">
    <h1><a href="{{ url(config('dotenveditor.route.prefix')) }}">{{ __('dotenv-editor::views.title') }}</a></h1>
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li v-for="view in views" role="presentation" class="@{{ view.active ? 'active' : '' }}">
            <a href="javascript:;" @click="setActiveView(view.name)">@{{ view.name }}</a>
          </li>
        </ul>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        {{-- Error-Container --}}
        <div>
          <div class="alert alert-success" role="alert" v-show="alertsuccess">
            <button type="button" class="close" @click="closeAlert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            @{{ alertmessage }}
          </div>
          {{-- Errors from POST-Requests --}}
          @if(session('dotenv'))
          <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" aria-label="Close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session('dotenv') }}
          </div>
          @endif
        </div>
        {{-- Overview --}}
        <div v-show="views[0].active">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> {{ __('dotenv-editor::views.overview_title') }} </h2>
            </div>
            <div class="panel-body">
              <p> {!! __('dotenv-editor::views.overview_text') !!} </p>
              <p>
                <a href="javascript:;" v-show="loadButton" class="btn btn-primary" @click="loadEnv">
                  {{ __('dotenv-editor::views.overview_button') }}
                </a>
              </p>
            </div>
            <div class="table-responsive" v-show="!loadButton">
              <table class="table table-striped">
                <tr>
                  <th>{{ __('dotenv-editor::views.overview_table_key') }}</th>
                  <th>{{ __('dotenv-editor::views.overview_table_value') }}</th>
                  <th>{{ __('dotenv-editor::views.overview_table_options') }}</th>
                </tr>
                <tr v-for="entry in entries">
                  <td>@{{ entry.key }}</td>
                  <td>
                    <i class="fa fa-eye" @click="entry.hide = !entry.hide"></i>
                    <span>@{{ entry.value | hide(entry.hide) }}</span>
                  </td>
                  <td>
                    <a href="javascript:;" @click="editEntry(entry)" title="{{ __('dotenv-editor::views.overview_table_popover_edit') }}">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a href="javascript:;" @click="modal(entry)" title="{{ __('dotenv-editor::views.overview_table_popover_delete') }}">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          {{-- Modal delete --}}
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">@{{ deleteModal.title }}</h4>
                </div>
                <div class="modal-body">
                  <p>{!! __('dotenv-editor::views.overview_delete_modal_text') !!}</p>
                  <p class="text text-warning">
                    <strong>@{{ deleteModal.content }}</strong>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    {!! __('dotenv-editor::views.overview_delete_modal_no') !!}
                  </button>
                  <button type="button" class="btn btn-danger" @click="deleteEntry">
                    {!! __('dotenv-editor::views.overview_delete_modal_yes') !!}
                  </button>
                </div>
              </div>
            </div>
          </div>
          {{-- Modal edit --}}
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">{!! __('dotenv-editor::views.overview_edit_modal_title') !!}</h4>
                </div>
                <div class="modal-body">
                  <strong>{!! __('dotenv-editor::views.overview_edit_modal_key') !!}:</strong> @{{ toEdit.key }}<br><br>
                  <div class="form-group">
                    <label for="editvalue">{!! __('dotenv-editor::views.overview_edit_modal_value') !!}</label>
                    <input type="text" v-model="toEdit.value" id="editvalue" class="form-control">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    {!! __('dotenv-editor::views.overview_edit_modal_quit') !!}
                  </button>
                  <button type="button" class="btn btn-primary" @click="updateEntry">
                    {!! __('dotenv-editor::views.overview_edit_modal_save') !!}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Add new --}}
        <div v-show="views[1].active">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">{!! __('dotenv-editor::views.addnew_title') !!}</h2>
            </div>
            <div class="panel-body">
              <p>
                {!! __('dotenv-editor::views.addnew_text') !!}
              </p>

              <form @submit.prevent="addNew()">
                <div class="form-group">
                  <label for="newkey">{!! __('dotenv-editor::views.addnew_label_key') !!}</label>
                  <input type="text" name="newkey" id="newkey" v-model="newEntry.key" class="form-control">
                </div>
                <div class="form-group">
                  <label for="newvalue">{!! __('dotenv-editor::views.addnew_label_value') !!}</label>
                  <input type="text" name="newvalue" id="newvalue" v-model="newEntry.value" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">
                  {!! __('dotenv-editor::views.addnew_button_add') !!}
                </button>
              </form>
            </div>
          </div>
        </div>
        {{-- Backups --}}
        <div v-show="views[2].active">
          {{-- Create Backup --}}
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">{!! __('dotenv-editor::views.backup_title_one') !!}</h2>
            </div>
            <div class="panel-body">
              <a href="{{ url(config('dotenveditor.route.prefix') . "/createbackup") }}" class="btn btn-primary">
                {!! __('dotenv-editor::views.backup_create') !!}
              </a>
              <a href="{{ url(config('dotenveditor.route.prefix') . "/download") }}" class="btn btn-primary">
                {!! __('dotenv-editor::views.backup_download') !!}
              </a>
            </div>
          </div>

          {{-- List of available Backups --}}
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">{!! __('dotenv-editor::views.backup_title_two') !!}</h2>
            </div>
            <div class="panel-body">
              <p>
                {!! __('dotenv-editor::views.backup_restore_text') !!}
              </p>
              <p class="text-danger">
                {!! __('dotenv-editor::views.backup_restore_warning') !!}
              </p>
              @if(!$backups)
              <p class="text text-info">
                {!! __('dotenv-editor::views.backup_no_backups') !!}
              </p>
              @endif
            </div>
            @if($backups)
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>{!! __('dotenv-editor::views.backup_table_nr') !!}</th>
                  <th>{!! __('dotenv-editor::views.backup_table_date') !!}</th>
                  <th>{!! __('dotenv-editor::views.backup_table_options') !!}</th>
                </tr>
                <?php $c = 1;?>
                @foreach($backups as $backup)
                <tr>
                  <td>{{ $c++ }}</td>
                  <td>{{ $backup['formatted'] }}</td>
                  <td>
                    <a class="btn btn-success" href="javascript:;" @click="showBackupDetails('{{ $backup['unformatted'] }}', '{{ $backup['formatted'] }}')" title="{!! __('dotenv-editor::views.backup_table_options_show') !!}">
                      <span class="fa fa-search-plus"></span>
                    </a>
                    <a class="btn btn-warning" href="javascript:;" @click="restoreBackup({{ $backup['unformatted'] }})" title="{!! __('dotenv-editor::views.backup_table_options_restore') !!}">
                      <span class="fa fa-refresh" title="{!! __('dotenv-editor::views.backup_table_options_restore') !!}"></span>
                    </a>
                    <a class="btn btn-info" href="{{ url(config('dotenveditor.route.prefix') . "/download/" . $backup['unformatted']) }}">
                      <span class="fa fa-download" title="{!! __('dotenv-editor::views.backup_table_options_download') !!}"></span>
                    </a>
                    <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="{{ url(config('dotenveditor.route.prefix') . "/deletebackup/" . $backup["unformatted"]) }}" title="{!! __('dotenv-editor::views.backup_table_options_delete') !!}">
                      <span class="fa fa-trash"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            @endif
          </div>

          @if($backups)
          {{-- Details Modal --}}
          <div class="modal fade" id="showDetails" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">{!! __('dotenv-editor::views.backup_modal_title') !!}</h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">
                    <tr>
                      <th>{!! __('dotenv-editor::views.backup_modal_key') !!}</th>
                      <th>{!! __('dotenv-editor::views.backup_modal_value') !!}</th>
                    </tr>
                    <tr v-for="entry in details">
                      <td>@{{ entry.key }}</td>
                      <td>@{{ entry.value }}</td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <a href="javascript:;" @click="restoreBackup(currentBackup.timestamp)" title="Stelle dieses Backup wieder her" class="btn btn-primary">
                    {!! __('dotenv-editor::views.backup_modal_restore') !!}
                  </a>

                  <button type="button" class="btn btn-default" data-dismiss="modal">{!! __('dotenv-editor::views.backup_modal_close') !!}</button>

                  <a onclick="return confirm('are you sure?')" href="{{ url(config('dotenveditor.route.prefix') . "/deletebackup/" . $backup["unformatted"]) }}" class="btn btn-danger">
                    {!! __('dotenv-editor::views.backup_modal_delete') !!}
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
        {{-- Upload --}}
        <div v-show="views[3].active">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">{!! __('dotenv-editor::views.upload_title') !!}</h2>
            </div>
            <div class="panel-body">
              <p>
                {!! __('dotenv-editor::views.upload_text') !!}<br>
                <span class="text text-warning">
                  {!! __('dotenv-editor::views.upload_warning') !!}
                </span>
              </p>
              <form method="post" action="{{ url(config('dotenveditor.route.prefix') . "/upload") }}" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="backup">{!! __('dotenv-editor::views.upload_label') !!}</label>
                  <input type="file" name="backup">
                </div>
                <button type="submit" class="btn btn-primary" title="Ein Backup von deinem Computer hochladen">
                  {!! __('dotenv-editor::views.upload_button') !!}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- box body -->
</div> <!-- box -->
@endsection

@push('js')
<script>
  new Vue({
    el: '#app',
    data: {
      loadButton: true,
      alertsuccess: 0,
      alertmessage: '',
      views: [
      {name: "{{ __('dotenv-editor::views.overview') }}", active: 1},
      {name: "{{ __('dotenv-editor::views.addnew') }}", active: 0},
      {name: "{{ __('dotenv-editor::views.backups') }}", active: 0},
      {name: "{{ __('dotenv-editor::views.upload') }}", active: 0}
      ],
      newEntry: {
        key: "",
        value: ""
      },
      details: {},
      currentBackup: {
        timestamp: ''
      },
      toEdit: {},
      toDelete: {},
      deleteModal: {
        title: '',
        content: ''
      },
      token: "{!! csrf_token() !!}",
      entries: [

      ]
    },
    filters: {
      hide: function(value, hide) {
        if (hide) {
          return '*'.repeat(value.length)
        }
        return value
      }
    },
    methods: {
      loadEnv: function(){
        var vm = this;
        this.loadButton = false;
        $.getJSON("/{{ $url }}/getdetails", function(items){
          vm.entries = items.map(item => {
            item.hide = false
            if (
              item.key.toLowerCase().includes('key') ||
              item.key.toLowerCase().includes('secret') ||
              item.key.toLowerCase().includes('password')
              )
            {
              item.hide = true
            }
            return item
          });
        });
      },
      setActiveView: function(viewName){
        $.each(this.views, function(key, value){
          if(value.name == viewName){
            value.active = 1;
          } else {
            value.active = 0;
          }
        })
      },
      addNew: function(){
        var vm = this;
        var newkey = this.newEntry.key;
        var newvalue = this.newEntry.value;
        $.ajax({
          url: "/{{ $url }}/add",
          type: "post",
          data: {
            _token: this.token,
            key: newkey,
            value: newvalue
          },
          success: function(){
            vm.entries.push({
              key: newkey,
              value: newvalue
            });
            var msg = "{{ __('dotenv-editor::views.new_entry_added') }}";
            vm.showAlert("success", msg);
            vm.alertsuccess = 1;
            $("#newkey").val("");
            vm.newEntry.key = "";
            vm.newEntry.value = "";
            $("#newvalue").val("");
            $('#newkey').focus();
          }
        })
      },
      editEntry: function(entry){
        this.toEdit = {};
        this.toEdit = entry;
        $('#editModal').modal('show');
      },
      updateEntry: function(){
        var vm = this;
        $.ajax({
          url: "/{{ $url }}/update",
          type: "post",
          data: {
            _token: this.token,
            key: vm.toEdit.key,
            value: vm.toEdit.value
          },
          success: function(){
            var msg = "{{ __('dotenv-editor::views.entry_edited') }}";
            vm.showAlert("success", msg);
            $('#editModal').modal('hide');
          }
        })
      },
      makeBackup: function(){
        var vm = this;
        $.ajax({
          url: "/{{ $url }}/createbackup",
          type: "get",
          success: function(){
            vm.showAlert('success', "{{ __('dotenv-editor::views.backup_created') }}");
          }
        })
      },
      showBackupDetails: function(timestamp, formattedtimestamp){
        this.currentBackup.timestamp = timestamp;
        var vm = this;
        $.getJSON("/{{ $url }}/getdetails/" + timestamp, function(items){
          vm.details = items;
          $('#showDetails').modal('show');
        });
      },
      restoreBackup: function(timestamp){
        var vm = this;
        if (confirm('are you sure?')) {
          $.ajax({
            url: "/{{ $url }}/restore/" + timestamp,
            type: "get",
            success: function(){
              vm.loadEnv();
              $('#showDetails').modal('hide');
              vm.setActiveView('overview');
              vm.showAlert('success', '{{ __('dotenv-editor::views.backup_restored') }}');
            }
          })
        }
      },
      deleteEntry: function(){
        var entry = this.toDelete;
        var vm = this;

        $.ajax({
          url: "/{{ $url }}/delete",
          type: "post",
          data: {
            _token: this.token,
            key: entry.key
          },
          success: function(){
            var msg = "{{ __('dotenv-editor::views.entry_deleted') }}";
            vm.showAlert("success", msg);
          }
        });
        this.entries.$remove(entry);
        this.toDelete = {};
        $('#deleteModal').modal('hide');
      },
      showAlert: function(type, message){
        this.alertmessage = message;
        this.alertsuccess = 1;
      },
      closeAlert: function(){
        this.alertsuccess = 0;
      },
      modal: function(entry){
        this.toDelete = entry;
        this.deleteModal.title = "{{ __('dotenv-editor::views.delete_entry') }}";
        this.deleteModal.content = entry.key + "=" + entry.value;
        $('#deleteModal').modal('show');
      }
    }
  })
$(document).ready(function(){
  $(function () {
    $('[data-toggle="popover"]').popover()
  });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
})
</script>
@endpush
