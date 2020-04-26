import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.URL;
import java.net.URLConnection;
import java.util.Arrays;
import java.util.Map;
import java.util.Scanner;
import java.util.TreeMap;

public class DataProcess {

	private TreeMap<String, Student> students;
	private TreeMap<String, Section> sections;

	public DataProcess() {
		students = new TreeMap<>();
		sections =  new TreeMap<>();
	}

	public Map<String, Student> getStudents() {
		return students;
	}


	public Map<String, Section> getSections() {
		return sections;
	}


	public void populateDataFromURL(){
		try {
			URL shoppingInfo = new URL("http://cs.gettysburg.edu/~ojhadi01/NextGenerationCourseRegistration/studentPages/shoppingCartUtils/displayShoppingCart.php");
			URLConnection connection = shoppingInfo.openConnection();
			BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			String input = in.readLine();
			if(input!=null) {
				String[] eachLine = input.split("</br>");
				System.out.println(Arrays.toString(eachLine));
				for(String line: eachLine) {
					line = line.substring(1, line.length()-1);
					processLine(line);
				}
			}				
			in.close();
			populateSectionData();
		}
		catch(IOException e) {
			e.printStackTrace();
		}
	}

	public void populateDataFromScanner(){

		Scanner scan = new Scanner(System.in);
		while(true){
			String line = scan.nextLine().trim();
			if(line.equals("exit") || line.equals("")) {
				break;
			}
			else {
				//System.out.println("Processling line: " + line);
				processLine(line);
			}
		}
		scan.close();
		populateSectionData();
	}

	private void populateSectionData() {

		for(String studentID : students.keySet()) {

			Student student = students.get(studentID);
			for(String sectionID : student.getFirstPref()) {
				Section section = sections.get(sectionID);
				section.enrollStudent(student);
			}

		}
	}

	/**
	 * Constructs student and section objects and puts it into the dictionary. Also adds the course to student.
	 * @param line a string in the format (studentID, sectionID, placePref, seats)
	 */
	public void processLine(String line) {
		line = line.replaceAll("\"", "");
		String[] columns = line.split(",");
		//System.out.println("Line after split is: " + Arrays.toString(columns));
		String studentID = columns[0].trim();
		String sectionID = columns[1].trim();
		String placePref = columns[2].trim();
		String capacity = columns[3].trim();

		//System.out.println("\nNew Data is: " + studentID + "	" + sectionID + "	" + placePref + "	" + capacity);

		if(!sections.containsKey(sectionID))
			sections.put(sectionID, new Section(sectionID, Integer.parseInt(capacity)));

		if(!students.containsKey(studentID))
			students.put(studentID, new Student(studentID));

		Student student = students.get(studentID);
		if(!student.addClass(placePref, sectionID)) {
			System.out.println("Invalid input: " + placePref);
			System.exit(1);
		}
	}

	private RegisterNode solve() {
		RegisterNode solveNode = new RegisterNode(students, sections);
		SimulatedAnnealer anneal = new SimulatedAnnealer(solveNode, 1, 0.8);
		return anneal.search(1000);
	}

	public static void makeCSVFile(RegisterNode solvedNode) {
		PrintWriter printWriter = null;
		try {
			File file = new File("registration.csv");
			if(file.exists()) {
				file.delete();
			}
			file.createNewFile();
			printWriter = new PrintWriter(file);
			printWriter.println("sectionID, studentID");
			Map<String, Section> sections=  solvedNode.getSections(); 
			
			for(String sectionID : sections.keySet()) {
				Section section=  sections.get(sectionID);
				for(Student student: section.getEnrolledStudent()) {
					printWriter.println(String.join(",", sectionID, student.getStudentID()));
				}
			}
		}
		catch (FileNotFoundException e){
			
			e.printStackTrace();
			
		} 
		catch (IOException e) {
			
			e.printStackTrace();
		}
		finally {
			if ( printWriter != null ) {
				printWriter.close();
			}
		}
	}

	public static void main(String[] args) throws Exception {
		DataProcess dataprocess = new DataProcess();
		//dataprocess.populateDataFromURL();
		dataprocess.populateDataFromScanner();
		RegisterNode solvedNode = dataprocess.solve();
		System.out.println(solvedNode.toString());
		makeCSVFile(solvedNode);
	}


}