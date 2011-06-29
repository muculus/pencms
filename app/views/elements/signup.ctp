        <form id="loginform" method="post" action="/users/login">
        	<fieldset style="display:none;">
        		<input type="hidden" name="_method" value="POST" />
            </fieldset>
            
            
            <label for="user_login">نام کاربری
            <input type="text" name="data[User][email]"  /></label>
			
			
          
            <label for="user_pass">پسورد
            <input type="password" name="data[User][password]"/></label>
           

         
             <input type="submit"  value="Login" />
           
            
       </form>
        



