<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/pages/components/extended/toastr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}" type="text/javascript"></script>

<script src="{{asset('dist/select2.min.js')}}" type="text/javascript"></script>
<!--end::Global Theme Bundle -->


<script>



$(document).on('change', '.checkImageValid', function(){   

const file = this.files[0];
const  fileType = file['type'];




 const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

if (!validImageTypes.includes(fileType)) {
    
//   alert('invalid file');
// this.val('');

$(this).val(null);

   $('#invalidImageModal').modal('show');
   
}
else{
    
   return true;
    
}
  
    
});



    
</script>

