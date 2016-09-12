function ImageGallery(el) {


    var slide = $(el).find("div.slide");
    var img = $(el).find("#crop img");
    var navLeft = $(el).find("#nav-left");
    var navRight = $(el).find("#nav-right");

    var images = [1, 2, 3, 4, 5];

    var moveLeft = function () {
        var update = [];
        for (var i = 1; i < images.length; i++) {
            update.push(images[i]);
        }
        update.push(images[0]);
        images = update;
    }

    var moveRight = function () {
        var update = [];
        update.push(images[images.length - 1]);
        for (var i = 0; i < (images.length - 1); i++) {
            update.push(images[i]);
        }
        images = update;
    }

    var renderImages = function () {
        //console.log(images);
        for (var i = 0; i < images.length; i++) {
            $(slide).find("img:eq(" + i + ")").attr("src", "images/gallery/" + images[i] + ".jpg");
        }
    }


    $(navLeft).bind("click", function () {
        moveLeft();
        renderImages();
        return false
    });

    $(navRight).bind("click", function () {
        moveRight();
        renderImages();
        return false;
    });



}

function FormPopup(popup, url, subject) {

    var defaultContentTop = 195;
    var contentTopSpace = 95;
    var popupOverlay = $(popup).find(".popup-overlay");
    var popupContainer = $(popup).find(".popup-container");
    var success = $(popup).find("div.success");
    var form = $(popup).find("form");
    var sendButton = form.find("a.button");
    var me = this;

    var getHeight = function () {
        return $(document).height();
    }

    var getDocumentScroll = function () {
        return $(document).scrollTop();
    }

    var getContentTop = function () {
        return getDocumentScroll() == 0 ? defaultContentTop : (getDocumentScroll() + contentTopSpace);
    }

    var bindForm = function () {
        var inputs = form.find("input");
        inputs.bind("focus", function () {
            var val = $(this).val();
            if (val == $(this).attr("data-default")) {
                $(this).val("");
            }
        });

        inputs.bind("blur", function () {
            var val = $(this).val();
            if (val == "") {
                $(this).val($(this).attr("data-default"));
            }
        });

        inputs.bind("keyup", function () {
            if ($(this).val() != "" && $(this).val() != $(this).attr("data-default")) {
                $(this).removeClass("error");
            }
        });

        var data = {};


        sendButton.bind("click", function () {
            inputs.removeClass("error");
            inputs.each(function (index, el) {
                var val = $(el).val();
                var name = $(el).attr("name");
                data[name] = val;
                if (val == "" || val == $(el).attr("data-default")) {
                    $(el).addClass("error")
                }
            });
            data.subject = subject;
            if (!inputs.hasClass("error")) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    success: function () {
                        me.showSuccessMessage();
                        setTimeout(function () {
                            me.hideSuccessMessage();
                            me.hide();
                            me.reset();
                        }, 3000);
                    }
                })
            }
        })

    }

    me.show = function () {
        me.hideSuccessMessage();
        popupOverlay.height(getHeight());
        popupContainer.css("top", getContentTop());
        popup.show();
    }

    me.hide = function () {
        popup.hide();
    }

    me.showSuccessMessage = function () {
        success.show();
        form.hide();
    }

    me.hideSuccessMessage = function () {
        success.hide();
        form.show();
    }

    me.reset = function () {
        form[0].reset();
    }


    bindForm();
}

function Block1Animation() {

    this.show = function () {
        var t = new TimelineLite({});
        t.set($("#more-clients h1, #more-clients div.icon"), {visibility: "visible"});
        t.from($("#more-clients h1, #more-clients div.icon"), 0.5, {scale: 0.5, autoAlpha: 0})
            .set($("#more-clients div.tooltip-1"), {visibility: "visible"})
            .from($("#more-clients div.tooltip-1"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#more-clients div.tooltip-5"), {visibility: "visible"})
            .from($("#more-clients div.tooltip-5"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#more-clients div.tooltip-2"), {visibility: "visible"})
            .from($("#more-clients div.tooltip-2"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#more-clients div.tooltip-4"), {visibility: "visible"})
            .from($("#more-clients div.tooltip-4"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#more-clients div.tooltip-3"), {visibility: "visible"})
            .from($("#more-clients div.tooltip-3"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
    }

    this.hide = function () {
        $("#more-clients h1, #more-clients div.icon, #more-clients div.tooltip").css("visibility", "hidden");
    }

}

function Block2Animation() {
    this.show = function () {
        var t = new TimelineLite({});
        t.set($("#peoples div.tooltip-1 h1"), {visibility: "visible"})
            .from($("#peoples div.tooltip-1 h1"), 0.5, {scale: 0.5, autoAlpha: 0})
            .set($("#peoples div.tooltip-2 h1"), {visibility: "visible"})
            .from($("#peoples div.tooltip-2 h1"), 0.5, {scale: 0.5, autoAlpha: 0})
            .set($("#peoples div.tooltip-3 h1"), {visibility: "visible"})
            .from($("#peoples div.tooltip-3 h1"), 0.5, {scale: 0.5, autoAlpha: 0})
            .set($("#peoples div.tooltip-4 h1"), {visibility: "visible"})
            .from($("#peoples div.tooltip-4 h1"), 0.5, {scale: 0.5, autoAlpha: 0})
    }
    this.hide = function () {
        $("#peoples div.tooltip h1").css("visibility", "hidden");
    }


}

function Block3Animation() {
    this.show = function () {
        var t = new TimelineLite({});
        t.set($("#sales h1, #sales div.icon"), {visibility: "visible"})
            .from($("#sales h1, #sales div.icon"), 0.5, {scale: 0.5, autoAlpha: 0})
            .set($("#sales div.tooltip-1"), {visibility: "visible"})
            .from($("#sales div.tooltip-1"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#sales div.tooltip-2"), {visibility: "visible"})
            .from($("#sales div.tooltip-2"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#sales div.tooltip-3"), {visibility: "visible"})
            .from($("#sales div.tooltip-3"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
            .set($("#sales div.tooltip-4"), {visibility: "visible"})
            .from($("#sales div.tooltip-4"), 0.5, {scale: 0.5, autoAlpha: 0, delay: 0.5})
    }

    this.hide = function () {
        $("#sales h1, #sales div.icon, #sales div.tooltip").css("visibility", "hidden");
    }

}


$(document).ready(function () {
    ImageGallery($("#gallery"));
    var requestPopup = new FormPopup($("div.popup[data-rel='request']"),"send.php","Floristea.com - заявка с сайта");
    var callBackPopup = new FormPopup($("div.popup[data-rel='callback']"),"send.php", "Floristea.com - обратный звонок");
    var certificates = new FormPopup($("div.popup[data-rel='certificates']"),"send.php", "Floristea.com - запрос сертификата");
    var catalog = new FormPopup($("div.popup[data-rel='catalog']"),"send.php", "Floristea.com - запрос каталога");
    var popups = {
         "request" : requestPopup,
        "callback" : callBackPopup,
        "certificates" : certificates,
        "catalog" : catalog
    }
    $('a[data-action="showPopup"]').bind("click", function () {
        var target = $(this).attr("data-target");
        if(popups[target]){
            popups[target].show();
        }
        return false;
    });
    $('a.close').bind("click", function () {
        _.each(popups,function(popup){
            popup.hide();
        });
        return false;
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { $('a.close').click(); }
    });
    var Animations = [new Block1Animation(), new Block2Animation(), new Block3Animation()];
    _.each(Animations, function (an) {
        an.hide();
    });

    $(".scroll-animate").each(function (index, el) {
        var block = $(el);
        $(window).scroll(function () {
            var top = block.offset().top;
            var bottom = block.height() + top;
            top = top - $(window).height();
            var scroll_top = $(this).scrollTop();
            if ((scroll_top > top) && (scroll_top < bottom)) {
                //console.log("XXX");
                if (!block.hasClass('animate')) {
                    block.addClass('animate');
                    Animations[index].show();
                }
            } else {
                //  Animations[index].show();
                //block.removeClass('animate');
                //block.trigger('animateOut');
            }
        });
    });

    var navigationTop = $("#navigation").offset().top;
    var navigationHeight  = $("#navigation").height();


    $(window).scroll(function(){
        var top = $(document).scrollTop();
        if(top >= navigationTop){
            $("#navigation").addClass("fixed")
            //$("#navigation div.size").css({top:navigationTop + navigationHeight});
        } else {
            $("#navigation").removeClass("fixed");
        }
    })
});

var pageModel = new Backbone.Model({
    templateId : null
});

var PageView = Backbone.View.extend({
    initialize : function(){
        var me = this;
        me.model.bind("change",function(){
          me.render();
        });
    },
    render : function(){
        var me = this;
        me.$el.empty().html($("#" + me.model.get("templateId")).html());
        var previousAttributes = me.model.previousAttributes();
        if(previousAttributes.templateId != null){
            $('html, body').animate({
                scrollTop: (me.$el.offset().top - 100)
            }, 500);
        }
    }
});

var NavigationView = Backbone.View.extend({
    ids : {
        "indexContent" : 0,
        "crimeaLegendsContent" : 1,
        "bonusContent" : 2
    },
    initialize : function(){
        var me = this;
        me.model.bind("change",function(){
            me.render();
        });
    },
    render : function(){
        var me = this;
        var tId = me.model.get("templateId");
        me.$el.find("a").removeClass('active');
        if(me.ids[tId]){
            me.$el.find("a:eq(" + me.ids[tId] + ")").addClass("active");
        } else {
            me.$el.find("a:eq(0)").addClass("active");
        }
    }
})

var pageView = new PageView({
    el: $("#products"),
    model : pageModel
});

var navigationView = new NavigationView({
    el : $("#navigation"),
    model : pageModel
});

Finch.route("/",function(){
    Finch.navigate("home");
});

Finch.route("/home",function(){
    pageView.model.set({
        templateId:"indexContent"
    });
});

Finch.route("/crimea-legends",function(){
    pageView.model.set({
        templateId:"crimeaLegendsContent"
    });
});

Finch.route("/bonus",function(){
    pageView.model.set({
        templateId:"bonusContent"
    });
})

Finch.listen();