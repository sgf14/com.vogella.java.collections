package com.vogella.java.collections;

import java.util.ArrayList;


public class collections {

	public static void main(String[] args) {
		ArrayList<String> var = new ArrayList<String>();
		
		var.add("Lars");
		var.add("Tom");
		var.add("Charity");
		
		for (String s : var) {
			System.out.println(s);
		}

	}

}
