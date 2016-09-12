$(document).ready(function(){
    $("#callback-form input").bind("focus",function(){
        var defValue = $(this).attr("data-default");
        var val = $(this).val();
        if(val == defValue){
            $(this).val("");
        }
    });

    $("#callback-form input").bind("blur",function(){
        var defValue = $(this).attr("data-default");
        var val = $(this).val();
        if(val == ""){
            $(this).val(defValue);
        }
    });

    var isValid = function(el){
        var valid = true;
        $(el).find("input.text").each(function(index,input){
            var val = $(input).val();
            var defaultVal = $(input).attr("data-default");
            if(!val || !val.length || (defaultVal && (val == defaultVal))){
                valid = false;
                $(input).addClass('error');
                return false;
            }
        });
        return valid;
    }

    var sendForm = function(url,data){
        yaCounter21675784.reachGoal('ORDER');
        return $.ajax({
            url : url,
            type : "POST",
            data : data
        })
    }

    function HandleFormSubmit(el){

        $(el).find("a.button").bind("click",function(){
            $(el).find("input").removeClass("error");
            if(isValid(el)){
                var data = {
                    subject : $(el).attr("data-subject")
                };
                $(el).find("input").each(function(index,input){
                    data[$(input).attr("data-field")] = $(input).val();
                });
                $(el).find("a.button").hide();
                $(el).find("div.progress").text("Отправляю...").show();
                sendForm("send-form.php",data).done(function(){
                    $(el).find("div.progress").text("Отправлено").show();
                    setTimeout(function(){
                        $(el).find("form")[0].reset();
                        $(el).find("div.progress").hide();
                        $(el).find("a.button").show();
                        if($(".modal").is(":visible")){
                            hideModal();
                        }
                    },2000)
                })
            }
            return false;
        })
    }


    function HandleRequestSubmit(el){

        $(el).find("a.button").bind("click",function(){
            $(el).find("input").removeClass("error");
            if(isValid(el)){
                var data = {};
                $(el).find("input").each(function(index,input){
                    data[$(input).attr("data-field")] = $(input).val();
                });
                $(el).find("a.button").hide();
                $(el).find("div.progress").text("Отправляю...").show();
                sendForm("request.php",data).done(function(){
                    $(el).find("div.progress").text("Отправлено").show();
                    setTimeout(function(){
                        $(el).find("div.progress").hide();
                        $(el).find("a.button").show();
                    },2000)
                })
            }
            return false;
        })
    }

    $(".send-form").each(function(index,el){
        HandleFormSubmit(el);
    })

    HandleRequestSubmit($("#callback-form"));

    function showModal(el){
        $(".modal-overlay").height($(document).height()).css("display","block");
        $(".modal").css("top",$(document).scrollTop() + 100).css("display","block");
        $(".modal .send-form").attr("data-subject",$(el).attr("data-subject"));
    }

    function hideModal(){
        $(".modal-overlay").css("display","none");
        $(".modal").css("display","none");
    }

    $(".section5 ul a").bind("click",function(){
        showModal(this);
        return false;
    });

    $(".section9 a").bind("click",function(){
        showModal(this);
        return false;
    });


    $("div.close a").bind("click",function(){
        hideModal();
        return false;
    })




})