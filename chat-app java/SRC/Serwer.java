/**
 * @(#)Serwer.java
 *
 *
 * @author 
 * @version 1.00 2022/11/25
 */
import java.io.IOException;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.*;
import java.io.*;
import java.util.ArrayList;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Serwer implements Runnable {
	
	private ArrayList<ConnectionManager>connections;

	private ServerSocket Serwer;
	private boolean ready;
	private ExecutorService group;
	public Serwer(){
		connections = new ArrayList<>();
		ready = false;
	}


@Override

public void run (){


try {

	Serwer = new ServerSocket(9999);
	group = Executors.newCachedThreadPool();
		while(!ready)

			{
		
	Socket client = Serwer.accept();

 BufferedReader in;
 PrintWriter out;  
 	    			out = new PrintWriter(client.getOutputStream(),true);

    			in = new BufferedReader(new InputStreamReader(client.getInputStream()));
 String username; 
out.println("pls enter your name:  ");
username = in.readLine();
out.println("thank you "+ username);
	ConnectionManager handler = new ConnectionManager(client, username);

	connections.add(handler);
	group.execute(handler);
		}
}
catch (Exception e)
{
closing();
}
	
	
}

public void broadcast(String message)
{
for (ConnectionManager ch:connections)	
{
	if(ch!= null)
	{
		ch.sendMessage(message);
	}
}

	
}
public void unicast(String message, String username, String recipient)
{
	for (ConnectionManager ch:connections)	{
	
					if (ch.username.equals(recipient) )
					{
		ch.sendMessage(message);
						break;
					}
	}
}
public void multicast(String message, String[]sendToList)
{

for (String usr : sendToList){

for (ConnectionManager x:connections)
{
if (x.username.equals(usr))
{

	{
		x.sendMessage(message);
	
	}
}

}
}

	
}
public void closing ()
{
	try{
	
	ready = true;

	group.shutdown();

if(!Serwer.isClosed())	{
	Serwer.close();
}
for (ConnectionManager x: connections){
	x.closing();
}
	}catch(IOException e){
	
	}
}


    class ConnectionManager implements Runnable
    {
    	
    	private Socket client;
    	private BufferedReader in;
     	private PrintWriter out;  
     	private String username; 	
     		
 //metoday conhandl ktora pobiera socket klienta i ic dalej nie robi    		
    public ConnectionManager (Socket client, String username){
    	this.client = client;
    	this.username = username;
    	
    }	
    	

    @Override
    	public void run (){
    		try{
    			out = new PrintWriter(client.getOutputStream(),true);

    			in = new BufferedReader(new InputStreamReader(client.getInputStream()));

    			System.out.println(username + " connected");
    			broadcast(username + " joined chat");
    			String message;
    			while((message = in.readLine()) != null){
    				if(message.startsWith("/nick ")){
    				String[]messageSplit = message.split(" ",2);
    				if(messageSplit.length == 2){
    					broadcast(username + " renamed themselves to " + messageSplit[1]);
    					System.out.println(username + " renamed themselves to " + messageSplit[1]);
    					username = messageSplit[1];
    					out.println("succesfully change name to" + username);
    				}else{
    					out.println(" noo username provided");
    				}
    				} else if (message.startsWith("/q")){
    					broadcast(username + " left group");
    					closing();
    				
    				} else if (message.startsWith("/name")){
String[]messageSplit = message.split(" ",3);
    				if(messageSplit.length == 3){
    					broadcast(username + " unicasting " + messageSplit[1]);
    					String recipient = messageSplit[1];
    					unicast(username + messageSplit[2], username, recipient);
    				} else{
      					broadcast(username + " make it incorrect " );  					
    				}
    				}else if (message.startsWith("/multi,")){

String[]sendToList = message.split(",");

    					broadcast(username + " multicasting " +message);

    					out.println("pls enter multicast message:  ");
message = in.readLine();
out.println("thank you for multicast message "+ username);
multicast(message, sendToList);	 
    				}
    					else {
    					broadcast(username + ": " + message );
    				}
    			}
    		}
    		catch(IOException e){
    			closing();
    		}

}	

public void sendMessage(String message)
{
	out.println(message);
}
public void closing()
{
	try{
	in.close();
out.close();
if(!client.isClosed())	{
	client.close();	
		}
	}
		catch(IOException e)
		{

		}


}
    }
    public static void main(String[] args) {
    	Serwer Serwer = new Serwer();
    	Serwer.run();
    	
    }
}
