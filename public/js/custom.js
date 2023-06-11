$(".alert").slideDown("slow").delay(2000).slideUp("slow");

const previewImg = (imgId, imgClass) => {
  const image = document.querySelector(imgId);
  const imgPreview = document.querySelector(imgClass);

  const fileImage = new FileReader();
  fileImage.readAsDataURL(image.files[0]);

  fileImage.onload = function (e) {
    $(`#img-preview`).removeClass("d-none");
    imgPreview.src = e.target.result;
  };
};
