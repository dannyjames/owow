// Wait for Cordova to load
//
document.addEventListener("deviceready", onDeviceReady2, false);

// Audio player
//
var my_media = null;
var mediaTimer = null;
var entryPath = null;
var name = null;
var fs = null;
var AUDIO_TIME = 1000 * 60 * 10;
var AUDIO_URL = 'http://owow.com/uploader.php';

function onDeviceReady2() {
  console.log('device ready');

  Media.prototype.startRecordWithSettings = function(options) {
      Cordova.exec(null, null, "AudioRecord","startAudioRecord", [this.id, this.src, options]);
  };

  Media.prototype.stopRecordWithSettings = function() {
      Cordova.exec(null, null, "AudioRecord","stopAudioRecord", [this.id, this.src]);
  };
  window.requestFileSystem(LocalFileSystem.PERSISTENT, 0, gotFS, fail);
}

function gotFS(fileSystem) {
  console.log('gotFS');
  fs = fileSystem;
  createFile();
}

function createFile() {
  /* http://docs.phonegap.com/en/2.3.0/cordova_media_media.md.html#media.startRecord
   *
   * iOS Quirks:
   *
   * The file to record to must already exist and should be of type .wav
   */
  name = Date.now() + '.wav';
  console.log('creating file: ' + name);
  fs.root.getFile(name, {create: true, exclusive: false}, gotFileEntry, fail);
}

function gotFileEntry(fileEntry) {
  entryPath = fileEntry.fullPath;
  recordAudio();
}

function recordAudio() {
  console.log('recordAudio');
  var media = new Media(entryPath, uploadFile);
  var recordSettings = {
    "FormatID": 'kAudioFormatiLBC',
    "SampleRate": 8000,
    "NumberOfChannels": 1,
    "LinearPCMBitDepth": 8
  };
  media.startRecordWithSettings(recordSettings);
  setTimeout(function() {
      media.stopRecordWithSettings();
      setTimeout(uploadFile, 2000); // XXX - the plugin doesn't auto invoke success callback
    }, AUDIO_TIME);
}

function uploadFile() {
  console.log('uploadfile');
  var options = new FileUploadOptions();
  options.fileName=name;
  options.mimeType="audio/wav";
  options.chunkedMode = false;

  var ft = new FileTransfer();
  ft.upload(entryPath, encodeURI(AUDIO_URL), win, fail, options);

  createFile();
}

function win(r) {
  console.log("Code = " + r.responseCode);
  console.log("Response = " + r.response);
  console.log("Sent = " + r.bytesSent);
}

function fail(error) {
  switch(error.code) {
    case FileTransferError.FILE_NOT_FOUND_ERR: alert("File not found"); break;
    case FileTransferError.INVALID_URL_ERR: alert("Invalid url error"); break;
    case FileTransferError.CONNECTION_ERR: alert("Connection error"); break;
    default: alert("unknown error");
  }
  alert("An error has occurred: Code = " + error.code);
  console.log("upload error source " + error.source);
  console.log("upload error target " + error.target);
}
