const names1 = document.querySelector('.name1')
    const names2 = document.querySelector('.name2')
    const btn = document.querySelector('.btn-chk')
    const chkBtn = document.querySelector('.display')
    const fqoute = document.querySelector('.fun-qoute')
    const reset = document.querySelector('.reset');
    const playBtn = document.querySelector('.play-btn')
    const icon = document.querySelector('.tag')
    const hide = document.querySelector('.hide')

    let isError = false;

    reset.addEventListener('click',() =>{
      if (isError) {
        hide.classList.add('hide');
        hide.classList.remove('show')
      }
      names1.value = ""
      names2.value = ""
      btn.innerHTML = "TEST"
      fqoute.innerHTML = `<p class="fun-qoute"><q>FUN QOUTE</q></p>`
    })
    let isPlaying = false;
    playBtn.addEventListener('click',() =>{
      if(!isPlaying){
        icon.classList.remove('fa-play-circle')
        icon.classList.add('fa-pause-circle')
        isPlaying = true;
      } else {
        icon.classList.remove('fa-pause-circle')
        icon.classList.add('fa-play-circle')
        isPlaying = false;
      }
    })
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
        // result = "Friend 👯‍♂️"
        btn.innerHTML = "FRIEND👯‍♂️"
        fqoute.innerHTML = "NOWADAYS LOT OF FRIEND MARRIAGES HAPPENED😆"
        break;
      case 'L':
        // result = "Love ❤"
        btn.innerHTML = "LOVE❤"
        fqoute.innerHTML = "YOU GOT LOVE, BUT MARRIAGE IS DOUBT😂🤣"
        break;
      case 'A':
        btn.innerHTML = "AFFECTION😢"
        // result = "AFFECTION"
        fqoute.innerHTML = "IT'S ALL FACT, I KNOW IT HURTS😶"
        break;
      case 'M':
        btn.innerHTML = "MARRIAGE💑😍"
        // result = "MARRIAGE"
        fqoute.innerHTML = "YOU GOT MARRIAGE, BUT WHERE IS LOVE🤔"
        break; 
      case 'E':
        btn.innerHTML = "ENEMY🤬"
        // result = "ENEMY"
        fqoute.innerHTML = "LET'S FIGHT TOGETHER 🤣"
        break;
      case 'S':
        btn.innerHTML = "SISTER👩‍👦"
        // result = "SISTER"
        fqoute.innerHTML = "AHH! IT's HARD TO THINK LIKE SISTER😆"
        break;                 
      default:
        break;

      
    }

    // chkBtn.innerHTML = result;
})
