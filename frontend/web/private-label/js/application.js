$(document).ready(function(){

    var defaultInputMap = {
        "name" : "Имя",
        "phone" : "Телефон",
        "email" : "Электронный адрес"
    }

    var inputs = $(".form-bkg input[type='text']");

    inputs.bind("focus",function(){
        $(this).val("");
    });

    inputs.bind("blur",function(){
        var name = $(this).attr("name");
        var val = $(this).val();
        if(!val || !val.length){
            $(this).val(defaultInputMap[name]);
        }
    });

    var popup = $("div.popup");

    function resetForm(form){
        form.find("div.success").hide();
        form.find("input").each(function(index,input){
            var defaultVal = defaultInputMap[$(input).attr("name")];
            $(input).val(defaultVal);
        });
        form.find("table").show();
    }

    function validateForm(el){
        var valid = true;
        el.find("input").removeClass("error");
        el.find("input").each(function(index,input){
            var val = $(input).val();
            var defaultVal = defaultInputMap[$(input).attr("name")];
            if(!val || !val.length || (val == defaultVal)){
                $(input).addClass("error");
                valid = false;
            }
        });
        return valid;
    }

    function closePopup(){
        popup.hide();
        resetForm(popup.find(".form-bkg"));
    }

    $(".form-bkg a.button").bind("click",function(){
        var buttonIndex = $(".form-bkg a.button").index(this);
        var dataSubject = $(this).attr("data-subject");
        var form = $(".form-bkg:eq(" + buttonIndex + ")");
        if(validateForm(form)){
            var obj = {};
            form.find("input").each(function(index,el){
                obj[$(el).attr("name")] = $(el).val();
            });
            var url = dataSubject == 1 ? "request.php" : "send-form.php";
            $.ajax({
                url : url,
                type : "POST",
                data : obj,
                success : function(response){
                    
                    var name = form.find("input[name='name']").val();
                    form.find("div.success h4").text("Спасибо, " + name);
                    form.find("table").hide();
                    form.find("div.success").show();

                    setTimeout(function () {
                        resetForm(form);
                    }, 3000)
                }
            })
        }
        return false;
    });

    $("a.button[data-action='open-popup']").bind("click",function(){
        popup.show();
        return false;
    })

    $(document).keyup(function(e){
        if(e.keyCode ==  27){
            if(popup.is(":visible")){
                closePopup();
            }
        }
    });

    popup.find("div.popup-overlay").click(function(){
        closePopup();
    });

    popup.find("a.close").bind("click",function(){
        closePopup();
    })

})