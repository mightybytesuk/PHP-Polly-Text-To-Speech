axios.post('polly.php?data=i+cant+wait+for+bed+time', {
    text: 'hello there',
})
.then(function (response){
    var audio = $('audio');
    audio[0].src = response.data;
    audio[0].play();
})
.catch(function (error){
    console.log(error);
});