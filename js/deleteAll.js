$(document).ready(function () {

    $('#all').on('click', function(e) {
     if($(this).is(':checked',true))
     {
        $(".sub_chk").prop('checked', true);
     } else {
        $(".sub_chk").prop('checked',false);
     }
    });

    $('.delete_all').on('click', function(e) {

        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
        {
            alert("アンケートを選択してください");
        }  else {

            var check = confirm("削除してもよろしいですか？");
            if(check == true){

                var join_selected_values = allVals.join(",");

                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                        }
                    }
                });
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                    setTimeout(function(){
                      location.reload();
                    }, 200);
                });
            }
        }
    });
});
