$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     "action.php", //url ñòðàíèöû (action_ajax_form.php)
        type:     "POST", //ìåòîä îòïðàâêè
        dataType: "html", //ôîðìàò äàííûõ
        data: $("#"+ajax_form).serialize(),  // Ñåàðèëèçóåì îáúåêò
        success: function(response) { //Äàííûå îòïðàâëåíû óñïåøíî
        	result = $.parseJSON(response);
        	$('#result_form').html('Èìÿ: '+result.name+'<br>Òåëåôîí: '+result.phonenumber);
    	},
    	error: function(response) { // Äàííûå íå îòïðàâëåíû
            $('#result_form').html('Îøèáêà. Äàííûå íå îòïðàâëåíû.');
    	}
 	});
}