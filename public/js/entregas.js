$(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#facturas_table').append('<tr id="row'+row_number+'"><td><input type="text" name="facturas[]" placeholder="Folio de factura" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+row_number+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      row_number++;
    });
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
  });