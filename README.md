# RFTS
Road Freight Transport System. A database project globally served to overcome the mining and transportation scams of goods.

# How to Use  
1. You can visit https://road-freight-transport.000webhostapp.com for going through the entire procedure of safe and scam-proof transports.  
  
2. Select the Sender Group. When prompted for credentials, use the below credentials created for illustration.  
     * Username : web_admin  
       Password : HiWebAdmin@RFTS  
     * After logging in the Sender group, you may first choose to view all the goods orders registered under various senders by clicking **VIEW RECORDS**.  
     * Then you can go ahead with creating a new order by clicking **UPDATE RECORDS**. Fill all the fields for a valid transaction and click on **SUBMIT** to register the new order. You may check the new order by clicking **BACK TO SERVICES** first and then **VIEW RECORDS**.  
     * Logout from the Sender group by clicking **LOGOUT** button.  
  
3. Select the Truck Owner Group. Use the same credentials for logging in.  
    * The Truck Owner is provided with only one service which is to view the transactions. Thus, he can not modify any records but only view them.  
    * Click on the **VIEW RECORDS** button to check that the new order created is assigned to a Truck Owner or not.  
    * Logout from the Truck Owner group by clicking **LOGOUT** button.  
  
4. Select the Receiver Group. Use the same credentials for logging in. 
    * Click on **VIEW RECORDS** to check for the new order which is dispatched from the Sender. Here you can see the fields **Date, Time and Status** are empty for the new order which you created through the Sender Group. Now, this is the work of the Receiver to update these fields after verifying that the correct goods have reached the factory.  
    * Click on **Back To Services** button, and then click on **VERIFY RECORDS** button for verifying the correct details of the truck which reached the factory site. First, enter the Number Plate of the Truck into the page and click on **CHECK** button. It automatically shows you the Transaction ID, and the Fastag of the Truck that left the Sender site VS the Fastag of the Truck that reached to the Receiver. If they are not same, then the transaction is automatically rejected and this is how scams are prevented. If they are same, then the webpage proceeds to show the manual details of the Truck (eg: No. of Wheels, Model Number etc). You may verify the manual details as well, after which you can complete the Transaction by providing **Date, Time and Status** of the Transaction.  
    * Click on **Back To Services** again, and check the updated details for the transaction by clicking **View Records** button.  
  
Thus, this RFTS system leaves no possibilities of goods scams.  
  
# Tools Used  
* The RFTS website is globally hosted through [000webhost](https://www.000webhost.com/).  
* HTML, CSS and JS is used for frontend development of the website.  
* PHP is used for backend development of the website.   
* mySQL/phpMyAdmin is used for managing the database services. 
