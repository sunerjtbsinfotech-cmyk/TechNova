const menuToggle=document.getElementById('menuToggle'),navMenu=document.getElementById('navMenu');
menuToggle?.addEventListener('click',()=>navMenu.classList.toggle('open'));
document.querySelectorAll('#navMenu a').forEach(link=>link.addEventListener('click',()=>navMenu.classList.remove('open')));
const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('visible');observer.unobserve(entry.target)}}),{threshold:.12});
document.querySelectorAll('.reveal').forEach(item=>observer.observe(item));
setTimeout(()=>document.querySelector('.toast')?.remove(),5000);
