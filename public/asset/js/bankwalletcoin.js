function paymentMethod(elm){
    var value = elm.val();
    $('#pay_type').val(value);
     document.getElementById('payment_type'+value).style.backgroundColor = '#AC2625';
  document.getElementById('payment_type'+value).style.color = '#ffffff';
    if(value==1){
   $('#bankModal').modal('show');
  
    }else if(value==3){
        var totalAmount = $("[name='total_amount']").val();
        
        $('#show_product_amount').html("KD "+totalAmount);
          $('#modal_wallet').modal('show');
        
    }else if(value==4){
        $('#modal_coinwallet').modal('show');
        
    }
  
  // document.getElementById('payment_type'+value).style.backgroundColor = '#AC2625';
  //document.getElementById('payment_type'+value).style.color = '#ffffff';

//     if(value==4){
//       var totalAmount = $("[name='total_amount']").val();
//       var id = elm.attr('data-id');
//       var startDate = $("[name='start_date']").val();
//       var endDate = $("[name='end_date']").val();     

//       if(totalAmount!="" && startDate!="" && endDate!=""){

//         $.ajax({
//             type: "post",
//             url: "{{url('coin-wallet/purchase')}}",
//             data: {
//               "_token" : "{{csrf_token()}}",
//               id : id,
//               totalAmount : totalAmount,
//             },
//             success: function(res) {
//               if(res.status == 'insufficient_amount'){
//                   $.notify("You have "+res.kds+" KDs in your wallet ", "error");
//                   $(".submitButton").hide();
//               }
//               else if(res.status == 'success'){
//                   $.notify("You can purchase this paln", "success");
//                   $(".submitButton").show();
//               }
//             },
//             error: function(msg) {
              
//             }
//         });
//       }
//       else{
//         $.notify("All fileds are required", "error");
//         $("[name='payment_type']").prop("checked", false);
//       }
      
//     }
//     else{
//       $(".submitButton").show();
//     }
    
     
  }
  function getBank(id){
       $('#bankModal').modal('hide');
       $('#account').val(id);
       
}
   
//$('#start_date')[0].valueAsDate = new Date();

// $('#start_date').change(function() {
//   var date= this.valueAsDate;
//   date.setDate(date.getDate() + 1);
//  //$('#end_date')[0].attr('min',date);
//  $('#end_date')[0].valueAsDate = date;
// });
$('.submitButton').click(function(){
    var totalAmount = $("[name='total_amount']").val();
    var paytype= $('#pay_type').val();
    
    if(totalAmount!=='' && paytype!=='' ){
        if(paytype==1){
         if($('#account').val()!==''){
                $(".submitButton").show();
             $("#formbanner").submit();
         }else{
              alert("please select the account");
               $(".submitButton").hide();
         }   
        }else{
        $("#formbanner").submit();
        }
    }else{
        alert("please fill all the field");
    }
    
    
});


