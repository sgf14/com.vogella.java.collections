package com.vogella.java.collections;

public class Counter {
	private int result = 0;
	
	public int getResult() {
		//get result method- called by counter demo debug file
		return result;
	}
	
	public void count() {
		for (int i = 0; i < 200; i++) {
			result += i + 1;
		}
	}
}
