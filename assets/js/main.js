(()=>{window.addEventListener("load",function(){let e="open-drawer",o=document.querySelector("body"),n=document.querySelector("#primary-menu"),t=document.querySelectorAll(".primary-menu-toggle");t.forEach(c=>{c.addEventListener("click",function(r){r.preventDefault(),t.forEach(a=>{a.classList.toggle(e)}),n.classList.toggle(e),o.classList.toggle(e)})})});})();