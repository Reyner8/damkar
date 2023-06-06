
// duplicate form
const validateBtn = document.getElementById('validate-btn'); 
validateBtn.addEventListener('click', (e) => {
  e.preventDefault;

  const valueInput = document.getElementById('number').value;
  const petugasContainer = document.getElementById('petugas-container');
  const node = document.getElementById('petugas');

  while(petugasContainer.hasChildNodes()){
    petugasContainer.removeChild(petugasContainer.firstChild);
  }
  
  for (let i = 0; i < valueInput; i++) {
    const clone = node.cloneNode(true);
    petugasContainer.appendChild(clone);  
  }
});