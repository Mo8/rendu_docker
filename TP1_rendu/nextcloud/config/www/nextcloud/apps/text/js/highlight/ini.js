(self.webpackChunk_nextcloud_text=self.webpackChunk_nextcloud_text||[]).push([["highlight/ini"],{29560:e=>{function n(e){return e?"string"==typeof e?e:e.source:null}function s(...e){return e.map((e=>n(e))).join("")}e.exports=function(e){const a={className:"number",relevance:0,variants:[{begin:/([+-]+)?[\d]+_[\d_]+/},{begin:e.NUMBER_RE}]},i=e.COMMENT();i.variants=[{begin:/;/,end:/$/},{begin:/#/,end:/$/}];const t={className:"variable",variants:[{begin:/\$[\w\d"][\w\d_]*/},{begin:/\$\{(.*?)\}/}]},l={className:"literal",begin:/\bon|off|true|false|yes|no\b/},c={className:"string",contains:[e.BACKSLASH_ESCAPE],variants:[{begin:"'''",end:"'''",relevance:10},{begin:'"""',end:'"""',relevance:10},{begin:'"',end:'"'},{begin:"'",end:"'"}]},r={begin:/\[/,end:/\]/,contains:[i,l,t,c,a,"self"],relevance:0},o=function(...e){return"("+e.map((e=>n(e))).join("|")+")"}(/[A-Za-z0-9_-]+/,/"(\\"|[^"])*"/,/'[^']*'/);return{name:"TOML, also INI",aliases:["toml"],case_insensitive:!0,illegal:/\S/,contains:[i,{className:"section",begin:/\[+/,end:/\]+/},{begin:s(o,"(\\s*\\.\\s*",o,")*",s("(?=",/\s*=\s*[^#\s]/,")")),className:"attr",starts:{end:/$/,contains:[i,r,l,t,c,a]}}]}}}}]);
//# sourceMappingURL=ini.js.map?v=399de0961c87502704e9