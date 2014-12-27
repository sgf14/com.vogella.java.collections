// Java collections- chap 35, pg 149- collection exercise

package com.vogella.java.collections;

import java.util.List;
import java.util.ArrayList;

public class Server {
	private String url;
	
	//getters and setters
	public String getUrl() {
		return url;
	}

	public void setUrl(String url) {
		this.url = url;
	}
	
//constructor using fields
	public Server(String url) {
		super();
		this.url = url;
	}
// code completion 'main' plus Cntl+space
	public static void main(String[] args) {
		List<Server> list = new ArrayList<Server>();
		list.add(new Server("http://vogella.com"));
		list.add(new Server("http://google.com"));
		list.add(new Server("http://amazon.com"));
		
		for (Server s : list) {
			//code completion 'syso' plus cntl+space
			System.out.println(s);
		}
	}
// w/o this toString method [Source menu/Generate toString()] the links show up listed as code instead of the string itself
// comment out block below and run to see diff.  in both cases the output is created by the for loop above
	@Override
	public String toString() {
		return "Server [url=" + url + "]";
	}
}
