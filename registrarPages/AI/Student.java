//Author Distanta
public class Student {
  
	private String studentID;
	private String[] firstPref;
	private String[] secondPref;
	
	public Student(String studentID) {
		this.studentID = studentID;
		firstPref =  new String[4];
		secondPref = new String[4];
	}
	
	/**
	 * Adds the class based on preference level.
	 * @param place Preference
	 * @param section Section class
	 * @return true if it was added otherwise false.
	 */
	public boolean addClass(String place, String sectionID){
		//Get course index
		int index = Integer.parseInt(place.charAt(0)+"") - 1;
		if(index < 0 || index > 3) {
			return false;
		}
		
		//Get the preference and add to respective array
		if(place.charAt(2)=='1') {
			firstPref[index] = sectionID;
		}
		else if(place.charAt(2)=='2') {
			secondPref[index] = sectionID;
		}
		else {
			return false;
		}
		return true;
	}
	
	public String getStudentID() {
		return studentID;
	}

	public String[] getFirstPref() {
		return firstPref;
	}
	
	public String[] getSecondPref(){
		return secondPref;
	}
	
	public String toString() {
		return studentID;
	}
	
	public int getSectionIndex(Section section, int choice) {
		String[] toLook = choice == 1 ? firstPref: secondPref;
		for(int i = 0; i< toLook.length; i++) {
			if(toLook[i].equals(section.getSectionID())) {
				return i;
			}
		}
		return -1;
	}

	/**
	 * Returns which choice the given section of the student
	 * @param section: Given section
	 * @return 1 if First Choice, 2 if Second Choice, 0 if Student does not want the class 
	 */
	public int whichChoice(Section section) {
		for(String sectionID : firstPref) {
			if(sectionID.equals(section.getSectionID()))
				return 1;
		}
		for(String sectionID : secondPref) {
			if(sectionID.equals(section.getSectionID()))
				return 2;
		}
		return 0;
	}
	
	/**
	 * Make deep copy of this object
	 * @return Deep Copied object
	 */
	public Student deepClone() {
		Student toReturn = new Student(studentID);
		for(int i = 0; i < 4 ; i++ ) {
			toReturn.firstPref[i] = this.firstPref[i];
			toReturn.secondPref[i] = this.secondPref[i];
		}
		return toReturn;
	}
	
}
