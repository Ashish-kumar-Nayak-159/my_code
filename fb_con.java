package conf;

import java.sql.*;
import java.util.*;
import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

public class fb_con extends HttpServlet {

	
	private static final long serialVersionUID = 1L;

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		PrintWriter out=response.getWriter();
		request.getRequestDispatcher("./index.html").include(request, response);
		
		String Hname=request.getParameter("name");
		String Hpassword=request.getParameter("password");
		
		Connection con;
		try {
			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/geeklogin","root","AKNashish159@");
			//here geeklogin is the database name, root is the username and AKNashish159@ is the password
			Statement stmt=con.createStatement();
			
			ResultSet rs=stmt.executeQuery("select * from account");
			
			while(rs.next()) {
				String name=rs.getString(2);
				String password=rs.getString(3);
				
				if(name.equals(Hname)) {
					if(password.equals(Hpassword)) {
						
						System.out.println("You'r name is "+name+" "+"and your password is "+password);
						HttpSession session=request.getSession();
						session.setAttribute("name",name);
					}
					else {
						System.out.println("Please enter currect Password .");
					}
					
				}
				else
				{
					System.out.println("Please register .");
					System.out.print("Sorry, username or password error!");
					request.getRequestDispatcher("./Create Page/Create page.html").include(request, response);
				}
				
			}
			con.close();
		} 
		
		catch (SQLException e) {
			e.printStackTrace();
		}
		
		
//		if(password.equals("admin123")){
//		out.print("Welcome, "+name);
//		HttpSession session=request.getSession();
//		session.setAttribute("name",name);
//		}
//		else{
//			out.print("Sorry, username or password error!");
//			request.getRequestDispatcher("login.html").include(request, response);
//		}
		
//		out.close();
	}

}

