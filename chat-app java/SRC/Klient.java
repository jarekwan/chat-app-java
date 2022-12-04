
import java.io.IOException;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.*;
import java.io.*;
import java.util.ArrayList;


public class Klient implements Runnable {
	
    	private Socket Klient;
    	private BufferedReader in;
     	private PrintWriter out; 
     	private boolean ready;

@Override

public void run()
{
	try{
		Klient = new Socket("localhost", 9999);
	out = new PrintWriter(Klient.getOutputStream(), true);

 in = new BufferedReader(new InputStreamReader(Klient.getInputStream()));
		InputHandler inHandler = new InputHandler();
		Thread x = new Thread(inHandler);
		x.start();
		
		String inMessage;
		while((inMessage = in.readLine())!= null){
			System.out.println(inMessage);
		}
		
		
	}catch(IOException e){
		closing();
	}
}

public void closing(){
	ready = true;
		try{
	in.close();
out.close();
if(!Klient.isClosed())	{
	Klient.close();	
		}
	}
		catch(IOException e)
		{
			
		}
}

class InputHandler implements Runnable{
@Override
	public void run(){
		try{
		BufferedReader inReader = new BufferedReader(new InputStreamReader(System.in));
	while(!ready){
		String message = inReader.readLine();
		if(message.equals("/q")){
			out.println(message);//tutaj bedzie wyslany q
			inReader.close();
			closing();
		}else{
			out.println(message);
		}
		
	}
		}
		catch(IOException e)
		{
			closing();
			
		}
	}
}
    public static void main(String[] args) {
 Klient Klient = new Klient();
 Klient.run();  
    	
    }
    
}