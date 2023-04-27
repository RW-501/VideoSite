
const videoGrid = document.getElementById('video-grid')
const myPeer = new Peer()
const myVideo = document.createElement('video')
myVideo.muted = true
const peers = {}
navigator.mediaDevices.getUserMedia({
  video: true,
  audio: false
}).then(stream => {
  addVideoStream(myVideo, stream)


 socket.emit('join-room', ROOM_ID, '4')
 
 
    const video = document.createElement('video')

      addVideoStream(video, stream)

 connectToNewUser(userId, stream)
 })


socket.on('user-disconnected', userId => {
  if (peers[userId]) peers[userId].close()
})


 

function connectToNewUser(userId, stream) {
  const call = myPeer.call(userId, stream)
  const video = document.createElement('video')
    addVideoStream(video, stream)
  
 //   video.remove()


}

function addVideoStream(video, stream) {
  video.srcObject = stream
  video.addEventListener('loadedmetadata', () => {
    video.play()
  })
  videoGrid.append(video)
}

 	console.log("ROOM_ID1  "+ROOM_ID+"     ")
	console.log("userId1  "+userId+"     ")