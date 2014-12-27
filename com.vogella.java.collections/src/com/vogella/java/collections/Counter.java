package com.vogella.java.collections;

public class Counter {
	private int result = 0;
	
	public int getResult() {
		//to do
		return result;
	}
	
	public void count() {
		for (int i = 0; i < 100; i++) {
			result += i + 1;
		}
	}
}
