const names1 = document.querySelector('.name1')
const names2 = document.querySelector('.name2')
const btn = document.querySelector('.btn-chk')
const chkBtn = document.querySelector('.display')
const fqoute = document.querySelector('.fun-qoute')
const reset = document.querySelector('.reset');
const playBtn = document.querySelector('.play-btn')
const icon = document.querySelector('.tag')
const hide = document.querySelector('.hide')
const playHeader2 = document.querySelector('.play-header2')
const mainpara = document.querySelector('.main-para');
const movieName = document.querySelector('.movie-name')
const resImg = document.getElementById('resImage');


    let isError = false;

    reset.addEventListener('click',() =>{
      if (isError) {
        hide.classList.add('hide');
        hide.classList.remove('show')
      }
      names1.value = ""
      names2.value = ""
      btn.innerHTML = "TEST"
      fqoute.textContent = `"FUN QOUTES"`
      chkBtn.innerHTML =""
      btn.style = "display:inline-block"
      playHeader2.textContent = "Tap to Play"
      resetTime();
    })
    

    let isPlaying = false;
    let lastPlayedTime = 0;
    const audio = document.getElementById("myAudio");

    function resetTime() {
      audio.pause();
      lastPlayedTime = 0;
      icon.classList.remove('fa-pause-circle')
      icon.classList.add('fa-play-circle')
      playBtn.style = "background-color: greenyellow !important;"
    }

    let affSongs = ["Affect1"]
    let loveSongs = ["love1","love2"]
    let sisSongs = ["sister1","sister2"]
    let marrSongs = ["marriage1","marriage2"]
    let enemSongs = ["enemy"]
    let friSongs = ["friend2"]

    audio.src = affSongs[0];
    playBtn.addEventListener('click',() =>{
      if(!isPlaying){
        icon.classList.remove('fa-play-circle')
        icon.classList.add('fa-pause-circle')
        audio.currentTime = lastPlayedTime;
        audio.play();
        playBtn.style = "background-color: red !important;"
        isPlaying = true;
      } else {
        icon.classList.remove('fa-pause-circle')
        icon.classList.add('fa-play-circle')
        lastPlayedTime = audio.currentTime;
        audio.pause();
        console.log(lastPlayedTime);
        playBtn.style = "background-color: greenyellow !important;"
        isPlaying = false;
      }
    })

    
    

  audio.addEventListener("ended",ended);

  function ended() {
    audio.pause();
    icon.classList.remove('fa-pause-circle')
    icon.classList.add('fa-play-circle')
    isPlaying = false;
    lastPlayedTime = 0;
    playBtn.style = "background-color: red"
    playHeader2.textContent = "PLAY AGAIN"
  }



    btn.addEventListener('click',() =>{
        let timeoutId;
        let n1 = String(names1.value).trim().replace(/\s+/g, "").toUpperCase();
        let n2 = String(names2.value).trim().replace(/\s+/g, "").toUpperCase();
        
        if(n1 == "" || n2 == ""){
          // console.log("Enter the names");
          chkBtn.innerText = "Enter the Names"
          clearInterval(timeoutId);
          timeoutId = setTimeout(() =>{
            chkBtn.innerText = ""
          },2000)
          return;
        }
        console.log(n1);
        console.log(n2);
    

       

    // Find the remain

    const name1 = n1.split("");
    const name2 = n2.split("");
    let totLen = n1.length + n2.length;

    let count = 0;
for (let i = 0; i < n1.length; i++) {
    for (let j = 0; j < n2.length; j++) {
        if (name1[i] === name2[j]) {
        name2[j] = '0';
        count += 2;
        break;
        }
    }
}

    console.log("Count:", count);
    let ans =  totLen - count;
    console.log("Ans:",ans);
    if (ans == 0) {
      chkBtn.innerHTML = "Same name Found";
      clearInterval(timeoutId);
          timeoutId = setTimeout(() =>{
            chkBtn.innerText = ""
          },2000)
      return;
    }
    isError = true;


    // ALORITHM BEGINS

    class CLL {
  constructor() {
    this.last = null;
    this.temp = null;
    this.prev = null;
  }

  insertAtBegin(val) {
    const newNode = new Node(val);

    if (!this.last) {
      this.last = newNode;
      newNode.next = newNode;
    } else {
      newNode.next = this.last.next;
      this.last.next = newNode;
    }
  }

  display() {
    if (!this.last) {
      console.log("Empty list");
      return;
    }

    let temp = this.last.next;
    do {
      console.log(temp.data + " ");
      temp = temp.next;
    } while (temp !== this.last.next);
  }

  loopThrough(ans) {
    this.temp = this.last;
    this.prev = null;

    for (let i = 0; i < ans; i++) {
      this.prev = this.temp;
      this.temp = this.temp.next;
    }
    this.prev.next = this.temp.next;
    const answer = this.finish(this.prev, ans);
    return answer.data;
  }

  finish(node, ans) {
    if (node.next === node) {
      return node;
    }
    this.temp = node;
    this.prev = null;

    for (let i = 0; i < ans; i++) {
      this.prev = this.temp;
      this.temp = this.temp.next;
    }
    
    this.prev.next = this.temp.next;
    return this.finish(this.prev, ans);
  }
}

    class Node {
    constructor(val) {
        this.data = val;
        this.next = null;
    }
    }

    const cll = new CLL();
    cll.insertAtBegin('S');
    cll.insertAtBegin('E');
    cll.insertAtBegin('M');
    cll.insertAtBegin('A');
    cll.insertAtBegin('L');
    cll.insertAtBegin('F');

    cll.display();
    let result = cll.loopThrough(ans);
    console.log("Result:", result);

    if (isError) {
      hide.classList.remove('hide')
      hide.classList.add('show');
    }


    switch (result) {
      case 'F':
        result = "FRIEND 👯‍♂️"
        // btn.innerHTML = "FRIEND👯‍♂️"
        fqoute.innerHTML = "NOWADAYS LOT OF FRIEND MARRIAGES HAPPENED😆"
        friend();
        break;
      case 'L':
        result = "LOVE ❤"
        // btn.innerHTML = "LOVE❤"
        fqoute.innerHTML = "YOU GOT LOVE, BUT MARRIAGE IS DOUBT😂🤣"
        love();
        break;
      case 'A':
        // btn.innerHTML = "AFFECTION"
        result = "AFFECTION 💔"
        fqoute.innerHTML = "ONE-SIDED LOVE IS LIKE A SELFIE WITH NO LIKES😶"
        affection();
        break;
      case 'M':
        // btn.innerHTML = "MARRIAGE💑😍"
        result = "MARRIAGE 💑"
        fqoute.innerHTML = "YOU GOT MARRIAGE, BUT WHERE IS LOVE😆🤔"
        marriage();
        break; 
      case 'E':
        // btn.innerHTML = "ENEMY🤬"
        result = "ENEMY 🤬"
        fqoute.innerHTML = "HEY ENEMY, WE'RE LIKE TOMATOES AND KETCHUP😆"
        enemy();
        break;
      case 'S':
        // btn.innerHTML = "SISTER👩‍👦"
        result = "SISTER 👩‍👦"
        fqoute.innerHTML = "AHH! IT's HARD TO THINK LIKE SISTER😆"
        sister()
        break;                 
      default:
        break;

      
    }
    chkBtn.innerHTML = result;
    btn.style = "display:none;";
      
})


let random = 0;
function affection() {
  mainpara.innerHTML = `IT'S LIKE A <span class="side">ONE SIDE LOVE💔</span>, IF YOU WANT TO FEEL THAT`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'POOVE UNAKKAGA (1996)'
  audio.src = `./audio/${affSongs[0]}.mp3`;
  resImg.src = "./images/affect1.jpg"
  
}
function love() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">LOVE❤</span> IS`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'SITA RAMAM (2022)'
  audio.src = `./audio/${loveSongs[randomNum()]}.mp3`;
  resImg.src = "./images/love1.jpg"
}

function sister() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">SISTER LOVE❤</span> IS`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'SIVAPPU MANJAL PACHAI (2019)'
  audio.src = `./audio/${sisSongs[randomNum()]}.mp3`;
  resImg.src = "./images/sister.jpg"
}

function marriage() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">MARRIAGE💑</span> IS`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'SILLUNU ORU KAADHAL (2006)'
  audio.src = `./audio/${marrSongs[randomNum()]}.mp3`;
  resImg.src = "./images/marriage.jpg"
}

function friend() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">FRIEND👯‍♂️</span> IS`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'PRIYAMAANA THOZHI (2003)'
  audio.src = `./audio/${friSongs[0]}.mp3`;
  resImg.src = "./images/friend.jpg"
}

function enemy() {
  mainpara.innerHTML = `IF YOU WANT TO KNOW WHAT THE <span class="side">ENEMY😡</span> IS`
  let side = document.querySelector('.side').style = "color:red; font-style:italic;";
  movieName.textContent = 'KODI (2016)'
  audio.src = `./audio/${enemSongs[0]}.mp3`;
  resImg.src = "./images/enemy1.jpg"
}
function randomNum() {
  random = Math.floor(Math.random() * 2);
  return random;
}
// console.log(randomNum());


 

