"use strict";

document.addEventListener("turbo:load", loadGalleryCreateEditData);

let albumId = "";
let categoryId = "";
let isEdit = false;
let galleryLangId = "";

function loadGalleryCreateEditData() {
    lightbox.init({
        resizeDuration: 200,
        wrapAround: true,
        fadeDuration: 600,
        imageFadeDuration: 600,
        positionFromTop: 100,
    });
    isEdit = $("#galleryEditIsEdit").val();
    galleryLangId = $("#galleryEditLangId").val();
    albumId = $("#galleryEditAlbumId").val();
    categoryId = $("#galleryEditCategoryId").val();
    $("#countryID, #stateID").select2({
        language: {
            noResults: function (params) {
                return Lang.get("messages.no_results_found");
            },
        },
        width: "100%",
    });

    $("#galleryLangId").val(galleryLangId).trigger("change");

    // if (isEdit && galleryLangId) {
    //     $('#galleryLangId').val(galleryLangId).trigger('change');
    // }
}

listen("change", "#galleryLangId", function () {
    $.ajax({
        url: route("album-list"),
        type: "get",
        dataType: "json",
        data: { langId: $(this).val() },
        success: function (data) {
            $("#galleryCategoryId").empty();
            $("#galleryCategoryId").select2({
                language: {
                    noResults: function (params) {
                        return Lang.get("messages.no_results_found");
                    },
                },
                placeholder: Lang.get("messages.common.select_category"),
                allowClear: false,
            });
            $("#galleryAlbumId").empty();
            $("#galleryAlbumId").select2({
                language: {
                    noResults: function (params) {
                        return Lang.get("messages.no_results_found");
                    },
                },
                placeholder: Lang.get("messages.gallery.select_album"),
                allowClear: false,
            });
            $("#galleryAlbumId").append(
                $('<option value=""></option>').text(
                    Lang.get("messages.gallery.select_album")
                )
            );
            $.each(data.data, function (i, v) {
                let ele = document.createElement("textarea");
                ele.innerHTML = v;
                $("#galleryAlbumId").append(
                    $("<option></option>").attr("value", i).text(ele.value)
                );
            });

            if (isEdit && albumId) {
                $("#galleryAlbumId").val(albumId).trigger("change");
            }
        },
    });
});

listen("change", "#galleryAlbumId", function () {
    $.ajax({
        url: route("album-category-list"),
        type: "get",
        dataType: "json",
        data: {
            albumId: $(this).val(),
            langId: $("#galleryLangId").val(),
        },
        success: function (data) {
            $("#galleryCategoryId").empty();
            $("#galleryCategoryId").select2({
                language: {
                    noResults: function (params) {
                        return Lang.get("messages.no_results_found");
                    },
                },
                placeholder: Lang.get("messages.common.select_category"),
                allowClear: false,
            });
            $.each(data.data, function (i, v) {
                let ele = document.createElement("textarea");
                ele.innerHTML = v;
                $("#galleryCategoryId").append(
                    $("<option></option>").attr("value", i).text(ele.value)
                );
            });

            if (isEdit && categoryId) {
                $("#galleryCategoryId").val(categoryId).trigger("change");
            }
        },
    });
});

function previewImagesAlbum() {
    var $preview = $("#preview").empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        // Cek jika file adalah gambar
        if (/\.(jpe?g|png|gif|webp)$/i.test(file.name)) {
            var reader = new FileReader();

            $(reader).on("load", function () {
                $preview.append(
                    $("<img/>", { src: this.result }).addClass("border-color")
                );
            });

            reader.readAsDataURL(file);
        }
        // Cek jika file adalah video
        else if (/\.(mp4|avi|mov|wmv)$/i.test(file.name)) {
            var reader = new FileReader();

            $(reader).on("load", function () {
                $preview.append(
                    $("<video/>", {
                        src: this.result,
                        controls: true,
                        width: "100px",
                        height: "60px",
                    }).addClass("border-color")
                );
            });

            reader.readAsDataURL(file);
        } else {
            // Menampilkan pesan jika file bukan gambar atau video yang didukung
            toastr.error(file.name + " " + Lang.get("File tidak valid"));
        }
    }
}

listen("change", "#galleryNewImage", previewImagesAlbum);
