<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%
  String admin_id = (String)session.getAttribute("adminOk");
  if(admin_id == null) {
%>
  <string>
    alert("관리자 로그아웃 성공하셨습니다.");
    location.href = "../SE_index.html";
  </script>
<%
    return;
  }
%>
<table style="width: 80%">
  <tr style="background-color: #lightblue; text-align: center;" >
    <td><a href="../SE_index.html">홈페이지</a></td>
    <td><a href="admin_log_out.jsp">로그아웃</a></td>
    <td><a href="Manager.jsp">회원관리</a></td>
    <td><a href="productmanager.jsp">상품관리</a></td>
  </tr>
</table>
