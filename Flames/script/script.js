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

    alert(`Please.. Adjust your Device Volume Based on your Environment!. "AutoPlay" audio is enabled in this site. You can Pause it under the Image`);


    let isError = false;

    reset.addEventListener('click',() =>{
      if (isError) {
        hide.classList.add('hide');
        hide.classList.remove('show')
      }
      names1.value = ""
      names2.value = ""
      btn.innerHTML = "TEST"
      fqoute.textContent = `"FUN QUOTES"`
      chkBtn.innerHTML =""
      btn.style = "display:inline-block"
      playHeader2.textContent = "TAP TO PAUSE"
      resetTime();
    })
    

    let isPlaying = true;
    let lastPlayedTime = 0;
    const audio = document.getElementById("myAudio");

    function resetTime() {
      audio.pause();
      lastPlayedTime = 0;
      icon.classList.remove('fa-play-circle')
      icon.classList.add('fa-pause-circle')
      playBtn.style = "background-color: red !important;"
    }

    let friSongs = ["friend1","friend2","friend3","friend4","friend5"]
    let loveSongs = ["love1","love2","love3","love4","love5"]
    let affSongs = ["affection1","affection2","affection3","affection4","affection5"]
    let marrSongs = ["marriage1","marriage2","marriage3","marriage4","marriage5"]
    let enemSongs = ["enemy"]
    let sisSongs = ["sister1","sister2","sister3","sister4","sister5"]

    // audio.src = affSongs[0];
    playBtn.addEventListener('click',() =>{
      if(!isPlaying){
        icon.classList.remove('fa-play-circle')
        icon.classList.add('fa-pause-circle')
        audio.currentTime = lastPlayedTime;
        audio.play();
        playHeader2.textContent = "TAP TO PAUSE"
        playBtn.style = "background-color: red;"
        isPlaying = true;
      } else {
        icon.classList.remove('fa-pause-circle')
        icon.classList.add('fa-play-circle')
        lastPlayedTime = audio.currentTime;
        audio.pause();
        playHeader2.textContent = "TAP TO PLAY"
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
    playBtn.style = "background-color: greenyellow !important;"
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


    // ALGORITHM BEGINS

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
        result = "FRIEND 🤝"
        // btn.innerHTML = "FRIEND👯‍♂️"
        fqoute.innerHTML = `"${friendQoute[randomNum()]}"`;
        friend();
        break;
      case 'L':
        result = "LOVE ❤"
        // btn.innerHTML = "LOVE❤"
        fqoute.innerHTML = `"${loveQoute[randomNum()]}"`;
        love();
        break;
      case 'A':
        // btn.innerHTML = "AFFECTION"
        result = "AFFECTION 💔"
        fqoute.innerHTML = `"${affectQoute[randomNum()]}"`;
        affection();
        break;
      case 'M':
        // btn.innerHTML = "MARRIAGE💑😍"
        result = "MARRIAGE 💑"
        fqoute.innerHTML = `"${marriageQoute[randomNum()]}"`;
        marriage();
        break; 
      case 'E':
        // btn.innerHTML = "ENEMY"
        result = "ENEMY😡"
        fqoute.innerHTML = `"${enemyQoute[randomNum()]}"`;
        enemy();
        break;
      case 'S':
        // btn.innerHTML = "SISTER👩‍👦"
        result = "SISTER 👩‍👦"
        fqoute.innerHTML = `"${sisterQoute[randomNum()]}"`;
        sister();
        break;                 
      default:
        break;

      
    }
    chkBtn.innerHTML = result;
    btn.style = "display:none;";
    audio.play();
      
})

let friendMov = ["Hey! Sinamika (2022)","Thiruchitrambalam (2022)","Bangalore Days (2014)","Oru Adaar Love (2019)","Priyamaana Thozhi (2003)"];
let loveMov = ["Sita Ramam (2022)","Madrasapattinam (2010)","Thulladha Manamum Thullum (1999)","Sachein (2005)","Raja Rani (2013)"];
let affectMov = ["Poove Unakkaga (1996)","Shahjahan (2001)" ,"Raangi (2001)","David (2013)","Mounam Pesiyadhe (2002)"];
let marriageMov = ["Sillunu Oru Kaadhal (2006)","Thaandavam (2012)","Raja Rani (2013)","Priyamanavale (2000)","Vaaranam Aayiram (2008)"];
let enemyMov = ["Kodi (2016)","Devathaiyai Kanden (2005)","Thimiru (2006)","Vallavan (2006)","Padayappa (1999)"];
let sisterMov = ["Sivappu Manjal Pachai (2019)","Thirupaachi (2005)","Namma Veettu Pillai (2019)","Velayudham (2011)","Vedi (2011)"];

// Images

let friendImages = ["friend1","friend2","friend3","friend4","friend5"];
let loveImages = ["love1","love2","love3","love4","love5"];
let affectImages = ["affect1","affect2","affect3","affect4","affect5"];
let marriageImages = ["marriage1","marriage2","marriage3","marriage4","marriage5"];
let enemyImages = ["enemy1","enemy2","enemy3","enemy4","enemy5"];
let sisterImages = ["sister1","sister2","sister3","sister4","sister5"];

// qoutes
let friendQoute = [
    "Nowadays lot of Friend come Marriage Happened 😆",
    "A Friend is Someone Who Knows you and Loves you just the same",
    "Friendship is the only cement that will ever hold the world together",
    "Friendship is like a wine, it gets better with age",
    "Friends are the family you choose"
];

let loveQoute = [
  "Love is like a roller coaster. It has its ups and downs, but it's always a thrilling ride.",
  "Love is like a game. It has its winners and losers, but it's always fun to play.",
  "Love is a language that everyone understands.",
  "Love is when you can't imagine your future without them.",
  "YOU GOT LOVE, BUT MARRIAGE IS DOUBT😂🤣"
];

let affectQoute = [
  "Your smile warms my heart",
  "With you, I've found my forever.",
  "One-Sided Love is like a Selfie with no likes😶",
  "I may be one-sided, but my love is 100% genuine.",
  `I'm in the 'waiting for a reply' stage of my love story`
];

let marriageQoute = [
  "You got Marriage but, Where is Love😂",
  "Love is blind, but marriage is a real eye-opener",
  "A successful marriage requires falling in love many times, always with the same person.",
  "Marriage is finding that one special person to annoy😆 for a lifetime.",
  "Marriage is an adventure, like going to war 😅"
];

let enemyQoute = [
  "Keep your friends close and your enemies in a 'block' list.",
  "Enemies are like unused apps; they take up space but serve no purpose.",
  "I love my enemies so much; I keep them in my heart...shaped punching bag.",
  `I'm not going to waste my time trying to understand you.`,
  "I'm going to keep fighting until the very end.😉"
];

let sisterQoute = [
  "Sisters are like built-in best friends.",
  "A sister is a little bit of childhood that can never be lost.",
  "Sisters are connected by the heart.",
  "Ahh! it's Hard to Think like a Sister😆",
  "Sisters are the people who know you best, and love you the most."
];






let random = 0;
function friend() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">FRIEND🤝</span> IS`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = friendMov[randomNum()];
  audio.src = `./audio/Friend/${friSongs[randomNumSongs()]}.mp3`;
  resImg.src = `./images/Friend/${friendImages[randomNumImages()]}.jpg`
}
function love() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">LOVE❤</span> IS`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = loveMov[randomNum()];
  audio.src = `./audio/Love/${loveSongs[randomNumSongs()]}.mp3`;
  resImg.src = `./images/Love/${loveImages[randomNumImages()]}.jpg`
}
function affection() {
  mainpara.innerHTML = `IT'S LIKE A <span class="side">ONE SIDE LOVE💔</span>, IF YOU WANT TO FEEL THAT`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = affectMov[randomNum()];
  audio.src = `./audio/Affection/${affSongs[randomNumSongs()]}.mp3`;
  resImg.src = `./images/Affection/${affectImages[randomNumImages()]}.jpg`
  
}
function marriage() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">MARRIAGE💑</span> IS`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = marriageMov[randomNum()];
  audio.src = `./audio/Marriage/${marrSongs[randomNumSongs()]}.mp3`;
  resImg.src = `./images/Marriage/${marriageImages[randomNumImages()]}.jpg`
}
function enemy() {
  mainpara.innerHTML = `IF YOU WANT TO KNOW WHAT THE <span class="side">ENEMY😡</span> IS`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = enemyMov[randomNum()];
  audio.src = `./audio/${enemSongs[0]}.mp3`;
  resImg.src = `./images/Enemy/${enemyImages[randomNumImages()]}.jpg`
}
function sister() {
  mainpara.innerHTML = `IF YOU WANT TO FEEL WHAT THE ACTUAL <span class="side">SISTER LOVE❤</span> IS`
  let side = document.querySelector('.side').style = "color:red;";
  movieName.textContent = sisterMov[randomNum()];
  audio.src = `./audio/Sister/${sisSongs[randomNumSongs()]}.mp3`;
  resImg.src = `./images/Sister/${sisterImages[randomNumImages()]}.jpg`
}

function randomNum() {
  random = Math.floor(Math.random() * 5);
  return random;
}

function randomNumSongs() {
  random = Math.floor(Math.random() * 5);
  return random;
}

function randomNumImages() {
  random = Math.floor(Math.random() * 5);
  return random;
}



