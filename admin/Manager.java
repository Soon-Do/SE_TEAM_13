public boolean admin_login(String admin_id, String admin_pass){
  boolean b = false;
  try {
    String sql = "select * from admin where admin_id = ? and admin_pass = ?";
    conn = ds.getConnection();
    pstmt = conn.prepareStatement(sql);
    pstmt.setString(1, admin_id);
    pstmt.setString(2, admin_pass);
    rs = pstmt.executeQuery();
    b=rs.next();
  } catch (Exception e) {
    System.out.println("admin_login err : " + e);
  } finally {
    try {
      fi(rs!=null)rs.close();
      if(pstmt!=null)pstmt.close();
      if(conn!=null)conn.close();
    } catch (Exception e2) {
      // handle exception
    }
    }
    return b;
  }
  public Arraylist<MemberDto> getMemberAll() {
    Arraylist<MemberDto> list = new Arraylist<MemberDto>();
    try {
      String sql = "select # from webshop_member";
      conn = ds.getConnection();
      pstmt = conn.prepareStatement(sql);
      rs = pstmt.executeQuery();
      while(rs.next()){
        MemberDto dto = new MemberDto();
        dto.setId(rs.getString("id"));
        dto.setName(rs.getString("name"));
        dto.setMail(rs.getString("mail"));
        dto.setPhone(rs.getString("phone"));
        list.add(dto);
      }
    } catch (Exception e) {
      System.out.println("getMemberAll error : ");
    } finally {
      try {
        if(rs!=null)rs.close();
        if(pstmt!=null)pstmt.close();
        if(conn!=null)conn.close();
      } catch (Exception e2) {
        //handle exception
      }
    }
    return list;
  }
