<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css" />
<style>
    .btn {
        padding: 12px 12px;
        border-radius: 6px !important

    }

    .addVendor:hover{
        background-color: #3c3f72 !important;
        color: white !important;
    }
</style> 
<select id="selectbox" name="vendor" class="bs-select form-control input-lg" data-live-search="true" data-size="8">
    <option selected="selected" value="">-اختر الموردين-</option>
    @foreach($vendors as $vendor)
      <option value="{{$vendor->id}}">{{$vendor->name}}</option>
    @endforeach
    <option style="text-align: center;font-weight: bold;" class="addVendor" value="">إضافة جديد +</option>
</select>

<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script>
	 $(document).on('click', '.addVendor', function(){    
        $('.modal-title').text("اضف مورد جديدة");
        $('#action_button').val("أضف");
        $('#action').val("Add");
        $('#formModal').modal('show');
    });
</script>