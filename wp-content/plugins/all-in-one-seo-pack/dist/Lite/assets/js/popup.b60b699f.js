import{g as v}from"./params.597cd0f5.js";let r=!1,n=null,d;const a=i=>{d(i,n,a)},W=(i,s,e,u,o,l,t,_,c)=>{let f=50,w=50;if(o){const m=window.outerHeight;f=(window.innerWidth-e)/2,w=(m-50-u)/2}let p=`location=0,status=0,width=${e},height=${u},left=${f},top=${w}`;(s==="_blank"||s==="_self")&&(p=""),(!n||n.closed)&&(n=window.open(i,s,p)),n&&n.focus(),r=window.setInterval(()=>g(l,t,_,c),500),c&&(d=c,window.addEventListener("message",a,!1))},g=(i,s,e,u=!1)=>{if(u){if(!n){window.removeEventListener("message",a,!1),window.clearInterval(r),e();return}n.closed&&(n=null,window.removeEventListener("message",a,!1),window.clearInterval(r),e());return}let o={};try{o=v(n.location.search)}catch{}const l=[];if(i.forEach(t=>{if(o[t]!==void 0&&o[t]){l.push(!0);return}l.push(!1)}),l.every(t=>t))return window.clearInterval(r),s(o).then(()=>{n.close(),n=null,e(!0)});if(!n){window.clearInterval(r),e();return}n.closed&&(n=null,window.clearInterval(r),e())};export{W as p};