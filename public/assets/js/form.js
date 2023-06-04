
// duplicate form
const validateBtn = document.getElementById('validate-btn'); 
validateBtn.addEventListener('click', (e) => {
  e.preventDefault;
  const valueInput = document.getElementById('number').value;
  for (let i = 0; i < valueInput; i++) {
    const node = document.getElementById('petugas');
    const clone = node.cloneNode(true);
    document.getElementById('petugas-container').appendChild(clone);  
  }
});