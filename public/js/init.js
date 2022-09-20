const color = [
    "color-pink",
    "color-periwinkle",
    "color-red",
    "color-blue",
    "color-green"
];

function addItem(list_id){
    $.get("modal/addItem", {list_id:list_id}, function (rsp){
        $("#rspModal").html(rsp);
        $("#modal").modal("show");
    });
}

function editItem(card_id){
    $.get("api/card/"+card_id, function (rsp){
        $.get("modal/editItem", rsp, function (modalRsp){
            $("#rspModal").html(modalRsp);
            $("#modal").modal("show");
        });
    });
}

function deleteItem(card_id){
    $.post("api/card/"+card_id,{_method:"DELETE"},function(rsp){
        alert(rsp.message);
        window.location.reload();
    });
}

function drag_drop(){
    $( ".list" ).draggable({
        revertDuration: 100,
        start: function( event, ui ) {
            $( ".list" ).draggable( "option", "revert", true );
        }
    });

    $( ".grid .rsp" ).droppable({
        drop: function( event, ui ) {
            $( ".list" ).draggable( "option", "revert", false );
            $(ui.draggable).detach().css({top: 0,left: 0}).appendTo(this);
            let list = ui.draggable[0].offsetParent.getAttribute("id").match(/\d+/)[0];
            $("#card"+list).find(".list").each(function (index){
                let id = $(this).data("id");
                $.post("api/card/"+id,{_method:"PUT", list: list, queue: index},function(rsp){
                    $('.list[data-id='+id+']').removeClass(function (index, className) {
                        return (className.match (/(^|\s)color-\S+/g) || []).join(' ');
                    });
                    $('.list[data-id='+id+']').addClass(color[list - 1]);
                });
            });
        }
    });
}

$(document).on("submit",".postForm",function(e){
    e.preventDefault();
    var post = $(this);
    $.ajax({
        type: post.attr("method"),
        url: post.attr("action"),
        data: new FormData(post[0]),
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(rsp, status, xhr) {
            alert(rsp.message);

            if(xhr.status == 200)
                window.location.reload()

            if(xhr.status == 201)
                $("#card"+rsp.data.list).find(".rsp").append("<div class='list color-pink mb-2' data-id='"+rsp.data.id+"'><h2>"+rsp.data.title+"</h2><p>"+rsp.data.content+"</p><button class='btn btn-primary btn-sm' onclick='editItem("+rsp.data.id+")'>Edit</button><button class='btn btn-danger btn-sm ml-2' onclick='deleteItem("+rsp.data.id+")'>Delete</button></div>");

            $("#modal").modal("hide");
            drag_drop();

        }
    });
});

function loadData(){
    for (let id = 1; id <= 4; id++){
        $.get("api/card",{list:id}, function (rsp){
            rsp.data.forEach((data) => {
                $("#card"+id).find(".rsp").append("<div class='list "+color[id - 1]+" mb-2' data-id='"+data.id+"'><h2>"+data.title+"</h2><p>"+data.content+"</p> <button class='btn btn-primary btn-sm' onclick='editItem("+data.id+")'>Edit</button><button class='btn btn-danger btn-sm ml-2' onclick='deleteItem("+data.id+")'>Delete</button></div>");
            });
            drag_drop();
        });
    }
}

$(function (){
    loadData();
});
