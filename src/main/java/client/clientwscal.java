package client;

import proxy.CalculatriceWS; // Automated name based on your WSDL
import proxy.CalculatriceWSService; 

public class clientwscal {
    public static void main(String[] args) {
        // 1. Instantiate the generated service locator
        CalculatriceWSService service = new CalculatriceWSService();
        
        // 2. Get the port (the actual interface to interact with)
        CalculatriceWS proxy = service.getCalculatriceWSPort();
        
        // 3. Consume the web service methods
        int num1 = 10;
        int num2 = 20;
        double result = proxy.somme(num1, num2); // Matches 'somme' operation in your Java service
        
        System.out.println("--- SOAP Java Client ---");
        System.out.println("The sum of " + num1 + " and " + num2 + " is: " + result);
    }
}
