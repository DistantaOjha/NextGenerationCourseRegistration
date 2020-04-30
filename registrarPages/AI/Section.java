import java.util.ArrayList;
import java.util.List;
//Author Distanta
public class Section {

	private String sectionID;
	private List<Student> enrolledStudent;
	private int capSize;
	
	public Section(String sectionID, int capSize) {
		this.sectionID = sectionID;
		this.capSize = capSize;
		enrolledStudent = new ArrayList<>();
	}
	
	/**
	 * Enrolls the student to the class
	 * @param student
	 */
	public void enrollStudent(Student student) {
		enrolledStudent.add(student);
	}
	
	/**
	 * Removes the student from enrollment list
	 * @param student
	 */
	public void removeEnrollStudent(Student student) {
		enrolledStudent.remove(student);
	}
	
	
	public Section deepClone() {
		Section toReturn = new Section(sectionID, capSize);
		for(Student stu: enrolledStudent) {
			toReturn.enrolledStudent.add(stu.deepClone());
		}
		
		return toReturn;
	}


	public String getSectionID() {
		return sectionID;
	}
	
	public List<Student> getEnrolledStudent() {
		return enrolledStudent;
	}


	public int getCapSize() {
		return capSize;
	}
	
	public int getEnrolledSize() {
		return enrolledStudent.size();
	}
	
	public String toString() {
		return sectionID;
	}

}
