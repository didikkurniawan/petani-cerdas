
var Upload = {
  uploadFile: uploadFile
};

function uploadFile(inputForm) {
  var inputFile = inputForm[0].files[0];
  var inputFileName = inputFile.name;

  var formData = new FormData();
  formData.append('file', inputFile, inputFileName);

  return $.ajax({
    url: site_url + '/file/upload_docs/file',
    type: 'POST',
    data: formData,
    cache: false,
    dataType: 'json',
    processData: false,
    contentType: false,
  }).then(function (result) {

    return result;
  }, function (err) {
    return result;
  });

}