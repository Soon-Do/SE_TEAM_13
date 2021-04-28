<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<% request.setCharacterEncoding("utf-8"); %>
<jsp:useBean id="membermanager" class="Manager"/>
<%
  String admin_id = request.getParameter("id");
  String admin_pass = request.getParameter("pass");
  boolean b = Manager.admin_login(admin_id, admin_pass);

  if(b) {
    session.setAttribute("adminOk", admin_id);
%>
  <script>
    alert("관리자님 로그인 성공하셨습니다.");
    location.href=history.back();
  </script>

<% } %>
