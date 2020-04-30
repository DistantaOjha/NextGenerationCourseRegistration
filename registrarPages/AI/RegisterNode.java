import java.util.List;
import java.util.Random;
import java.util.TreeMap;
//Author Distanta
public class RegisterNode {

	private TreeMap<String, Student> students;
	private TreeMap<String, Section> sections;
	public Random random;
	String fromSectionID;
	String toSectionID;
	String changingStudentID;



	public RegisterNode(TreeMap<String, Student> students, TreeMap<String, Section> sections) {
		this.students = students;
		this.sections = sections;
		this.random = new Random();
	}
	
	
	public TreeMap<String, Student> getStudents() {
		return students;
	}


	public TreeMap<String, Section> getSections() {
		return sections;
	}

	public String toString() {
		StringBuilder strBldr = new StringBuilder();

		for(String sectionID: sections.keySet()) {
			Section section = sections.get(sectionID);
			strBldr.append("Section is:" + sectionID + "\n");
			for(Student student : section.getEnrolledStudent()) {
				strBldr.append("\t" + student.getStudentID());
			}
			strBldr.append("\n-------------------------\n");
		}
		return strBldr.toString();
	}



	/**
	 * First Preference +10, Second preference +4
	 * @return
	 */
	public double energy() {
		double energy = 0;

		for(String sectionID : sections.keySet()) {
			Section section = sections.get(sectionID);
			for(Student student: section.getEnrolledStudent()) {
				int studentChoice = student.whichChoice(section);
				if(studentChoice == 1){
					energy += 10;
				}
				else if(studentChoice == 2) {
					energy += 4;
				}
				int cap = section.getCapSize();
				int enrollSize = section.getEnrolledSize();
				if( cap < enrollSize ) {
					energy = energy - ((enrollSize - cap + 1)*(enrollSize - cap + 1));
				}
			}
		}
		return -energy;
	}

	public void undo() {
		Student changingStudent = students.get(changingStudentID);
		Section fromSection = sections.get(fromSectionID);
		Section toSection = sections.get(toSectionID);
		
		fromSection.enrollStudent(changingStudent);
		toSection.removeEnrollStudent(changingStudent);		
	}

	/**
	 * Deep Copies this object
	 * @return Deep Copy of this object
	 */
	public RegisterNode deepClone() {
		TreeMap<String, Student> copiedStudents = new TreeMap<>();
		TreeMap<String, Section> copiedSections = new TreeMap<>();

		for(String sectionID : sections.keySet()) {
			Section copiedSection = sections.get(sectionID).deepClone();
			copiedSections.put(sectionID, copiedSection);
		}	

		for(String studentID : students.keySet()) {
			Student copiedStudent = students.get(studentID).deepClone();
			copiedStudents.put(studentID, copiedStudent);
		}

		RegisterNode toReturnNode = new RegisterNode(copiedStudents, copiedSections);
		toReturnNode.changingStudentID = this.changingStudentID;
		toReturnNode.fromSectionID =  this.fromSectionID;
		toReturnNode.toSectionID =  this.toSectionID;
		
		return toReturnNode;
	}


	public void step() {
		// get a non empty random section
		String[] sectionIDs = sections.keySet().toArray(new String[0]); //Changed to array because there's no guarantee that set will retain the order
		Section randomSection;
		int count = 0;
		do {
			int randomIndex = random.nextInt(sectionIDs.length);
			randomSection = sections.get(sectionIDs[randomIndex]);
			if(count>100) break;
			count++;
			//System.out.println("Section is: " + randomSectionID + " and enrollment size is: " + randomSection.getEnrolledSize());
		} while(randomSection.getEnrolledSize()==0); //Search again if random section has enrollment size of 0
		
		fromSectionID = randomSection.getSectionID();
		
		// get a random student from that class
		List<Student> enrollmentList = randomSection.getEnrolledStudent();
		Student randomEnrolledStudent = enrollmentList.get(random.nextInt(randomSection.getEnrolledSize()));
		changingStudentID = randomEnrolledStudent.getStudentID();
		
		// make that student enroll in his second choice (if sec1 was first pref) otherwise in first choice
		int choice = randomEnrolledStudent.whichChoice(randomSection);
		int sectionSlot = randomEnrolledStudent.getSectionIndex(randomSection, choice);
		String secondChoiceClassID = randomEnrolledStudent.getSecondPref()[sectionSlot];
		Section secondChoiceClass = sections.get(secondChoiceClassID);
		toSectionID = secondChoiceClassID;
		
		//enroll in the second class and remove from first class
		randomSection.removeEnrollStudent(randomEnrolledStudent);
		secondChoiceClass.enrollStudent(randomEnrolledStudent);
	}
}
